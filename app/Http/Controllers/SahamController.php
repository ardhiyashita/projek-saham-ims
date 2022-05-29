<?php

namespace App\Http\Controllers;

use App\Models\Emiten;
use App\Models\RekapSaham;
use App\Models\Saham;
use App\Models\Valas;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Facades\Excel;


class SahamController extends Controller
{

    public function dashboard()
    {
        // $close = RekapSaham::pluck('close');
        // $tanggal = RekapSaham::pluck('tanggal');
        $data = RekapSaham::all();
        if ($data) {

            return view('dashboard', compact(response()->json($data)));
        }

        // return view('dashboard', [
        //    'proc' => $data
        // ]);

        // if ($data) {
        //     $view = view('dashboard', [
        //    'proc' => $data
        //         ])->render();

        //     return response()->json($data);
        //  }
        // return view('dashboard', compact('close', 'tanggal'));
    }

    public function stock_page()
    {
        $list = Emiten::all();
        return view('listSahamPage', compact('list'));
    }

    public function intraday_stock(Request $request)
    {
        $key = 'MNOJKRVA1YI2TVBN';
        $simbol = $request->simbol;
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=" . $simbol . "&interval=5min&apikey=" . $key);

        if ($response->status() !== 200) {
            return 'Conection Failed!!';
        }

        $data = json_decode($response, true);
        // dd($data);

        if (empty($data)) {
            return 'Return Empty Data';
        }

        if ($data) {
            $key = array_values($data);
            $array = $key[1];

            $emiten = Emiten::where('simbol', '=', $simbol)->first();
            $emiten_id = $emiten->id;
            //mencari emiten saham        

            $count = count($array);
            //menghitung jumlah data yang didapatkan

            foreach ($array as $key => $value) {
                // to dump array key and value
                // if( > 2){
                //     break;
                // }
                // else{
                Saham::create([
                    'emiten_id' => $emiten_id,
                    'tanggal' => $key,
                    'open' => $value['1. open'],
                    'high' => $value['2. high'],
                    'low' => $value['3. low'],
                    'close' => $value['4. close'],
                    'volume' => $value['5. volume'],
                ]);

                $tanggal_awal = Carbon::parse($request->tanggal_awal);
                $tanggal_awal->toDateTimeString();
                //mengambil input tanggal_awal

                $tanggal_akhir = Carbon::parse($request->tanggal_akhir);
                $tanggal_akhir->toDateTimeString();
                //mengambil input tanggal_akhir

                if ($tanggal_akhir != $tanggal_awal) {
                    $saham = Saham::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->where('emiten_id', '=', $emiten_id)->get();
                    // $saham = DB::table('sahams')
                    // ->select('*')
                    // ->where(date('tanggal'), '=', $tanggal, 'AND', 'emiten_id', '=', $emiten_id)
                    // ->orderBy('id', 'DESC')
                    // ->get();
                    // print('akhir');
                    // dd($saham, $tanggal_akhir, $tanggal_awal);
                }

                if ($tanggal_akhir == $tanggal_awal) {

                    $expiryDate = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal_awal)->endOfDay()->toDateTimeString();
                    //mengambil input tanggal_besok
                    $saham = Saham::whereBetween('tanggal', [$tanggal_awal, $expiryDate])->where('emiten_id', '=', $emiten_id)->get();
                    // print('awal');
                    // dd($saham, $tanggal_awal, $expiryDate);
                }
            }

            // dd($array);                
            return view('sahamPage', compact('saham', 'simbol', 'count'));
        }
    }

    public function daily_stock_page()
    {
        $list = Emiten::all();
        return view('listRekapSahamPage', compact('list'));
    }


    public function daily_stock(Request $request)
    {
        $excel = $request->excel;
        $api = $request->api;

        if ($api or $excel) {

            if ($api) {

                $key = 'MNOJKRVA1YI2TVBN';
                $simbol = $request->simbol;
                // dd($simbol);
                $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" . $simbol . "&apikey=" . $key);

                if ($response->status() !== 200) {
                    return 'Conection Failed!!';
                }

                $data = json_decode($response, true);
                // dd($data);

                if (empty($data)) {
                    return 'Return Empty Data';
                }

                if ($data) {
                    $key = array_values($data);
                    $array = $key[1];
                    // dd($array);

                    $emiten = Emiten::where('simbol', '=', $simbol)->first();
                    $emiten_id = $emiten->id;
                    //mencari emiten saham        

                    $count = count($array);
                    //menghitung jumlah data yang didapatkan

                    foreach ($array as $key => $value) {
                        // to dump array key and value
                        // if( > 2){
                        //     break;
                        // }
                        // else{
                        RekapSaham::create([
                            'emiten_id' => $emiten_id,
                            'tanggal' => $key,
                            'open' => $value['1. open'],
                            'close' => $value['4. close'],
                            'sumber' => 'API Alphavantage',
                        ]);

                        $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
                        //mengambil input tanggal_awal

                        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();
                        //mengambil input tanggal_akhir

                        $saham = RekapSaham::where('tanggal', '=', $tanggal_awal, 'and', 'emiten_id', '=', $emiten_id)->get();
                        // print('awal');
                        // dd($saham, $tanggal_awal, $expiryDate);
                    }

                    // $counts = count($saham);
                    

                    //     for($i=0; $i<5;){

                    //         if($saham[$i]->close < $saham[$i+1]->close){
                    //             $grafik = "naik";
                    //             dd($grafik, $saham[$i]);
                    //         }
                    //         elseif($saham[$i]->close > $saham[$i+1]->close){
                    //             $grafik = "turun";
                    //         }
                    //         else{
                    //             $grafik = "seimbang";
                    //         }

                    //         $graf = [];
                    //         array_push($graf, $grafik);
                            
                    //     }
                        if ($tanggal_akhir != $tanggal_awal) {
                            $saham = RekapSaham::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->where('emiten_id', '=', $emiten_id)->get();
                            // dd($saham, $tanggal_akhir, $tanggal_awal, $emiten_id);
                        }

                        if ($tanggal_akhir == $tanggal_awal) {

                            $saham = RekapSaham::where('tanggal', '=', $tanggal_awal, 'and', 'emiten_id', '=', $emiten_id)->get();
                            // print('awal');
                            // dd($saham, $tanggal_awal, $expiryDate);
                        }
                    }
                }
                // dd($grafik);
                return view('rekapSahamPage', compact('saham', 'simbol', 'count'));
            }

            if ($excel) {
                $request->validate([
                    'files' => 'required|mimes:xls,xlsx',
                ]);

                // Store on default disk
                $file = $request->files;
                $path = $request->file('files')->getClientOriginalName();
                $filename = "/assets_edit/" . $path;
                $file->move($filename);

                // $import = Excel::store(new InvoicesExport(2018), $filename);

                dd($filename);
                // $data = Excel::load($path)->get();
                $data = Excel::import(new UsersImport, $path);
                dd($data);

                return back()->with('success', 'File Excel berhasil diimport');
            }


            // dd($array);                
            return view('rekapSahamPage', compact('saham', 'simbol', 'count'));        
    }

    public function save_intraday_stock(Request $request)
    {
        dd($request);
    }

    public function forex_page()
    {
        $list = Valas::all();
        return view('listForexPage', compact('list'));
    }

    public function intraday_forex(Request $request)
    {
        $key = 'MNOJKRVA1YI2TVBN';
        $from_symbol = $request->from_symbol;
        $to_symbol = $request->to_symbol;
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=FX_INTRADAY&from_symbol=" . $from_symbol . "&to_symbol=" . $to_symbol . "&interval=5min&apikey=" . $key);

        if ($response->status() !== 200) {
            return 'Conection Failed!!';
        }

        $data = json_decode($response, true);
        // dd($data);

        if (empty($data)) {
            return 'Return Empty Data';
        }

        if ($data) {
            $key = array_values($data);
            $array = $key[1];
            // dd($keys[1]);
            // foreach($data as $key=>$val){
            // {{ $val[0]->'open' }}
            return view('forexPage', compact('array', 'from_symbol', 'to_symbol'));
        }
    }

    public function exchange_page()
    {
        $list = Valas::all();
        return view('listExchangePage', compact('list'));
    }

    public function exchange_price(Request $request)
    {
        $key = 'MNOJKRVA1YI2TVBN';
        $from_symbol = $request->from_symbol;
        $to_symbol = $request->to_symbol;
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=" . $from_symbol . "&to_currency=" . $to_symbol . "&apikey=" . $key);

        if ($response->status() !== 200) {
            return 'Conection Failed!!';
        }

        $data = json_decode($response, true);
        // dd($data);

        if (empty($data)) {
            return 'Return Empty Data';
        }

        if ($data) {
            $array = array_values($data);
            return view('exchangePage', compact('array', 'from_symbol', 'to_symbol'));
        }
    }

    public function company_page()
    {
        $list = Emiten::all();
        return view('listCompanyPage', compact('list'));
    }

    public function company_data(Request $request)
    {
        $key = 'MNOJKRVA1YI2TVBN';
        $simbol = $request->simbol;
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=OVERVIEW&symbol=" . $simbol . "&apikey=demo" . $key);

        if ($response->status() !== 200) {
            return 'Conection Failed!!';
        }

        $data = json_decode($response, true);
        // dd($data);

        if (empty($data)) {
            return 'Return Empty Data';
        }

        if ($data) {
            $array = array_values($data);
            // $array = $key[1];
            // dd($array);
            return view('companyPage', compact('array', 'simbol'));
        }
    }

    public function company_list()
    {
        $list = Emiten::all();
        return view('tableCompany', compact('list'));
    }

    public function intraday_demo()
    {
        $key = 'MNOJKRVA1YI2TVBN';
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=" . $key);

        if ($response->status() !== 200) {
            return 'Conection Failed!!';
        }

        $data = json_decode($response, true);
        // dd($data);

        if (empty($data)) {
            return 'Return Empty Data';
        }

        if ($data) {
            $key = array_values($data);
            $array = $key[1];
            dd($array);

            // dd($array);                
            return view('sahamPage', compact('array'));
        }
    }

    /*public function daily_stock(Request $request)
    {
        $key = 'MNOJKRVA1YI2TVBN';
        $simbol = $request->simbol;
        // dd($simbol);
        $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=".$simbol."&apikey=".$key);

            if ($response->status() !== 200) {
                return 'Conection Failed!!';
            }

            $data = json_decode($response,true);
            // dd($data);

            if (empty($data)) {
                return 'Return Empty Data';
            }

            if($data){
                $array = array_values($data);
                dd($array);

                $emiten = Emiten::where('simbol', '=', $simbol)->first();
                $emiten_id = $emiten->id;
                //mencari emiten saham        

                $count = count($array);
                //menghitung jumlah data yang didapatkan

                foreach($array as $key => $value) {
                    // to dump array key and value
                    // if( > 2){
                    //     break;
                    // }
                    // else{
                        Saham::create([
                            'emiten_id' => $emiten_id,
                            'tanggal' => $key,
                            'open' => $value['1. open'],
                            'high' => $value['2. high'],
                            'low' => $value['3. low'],
                            'close' => $value['4. close'],
                            'volume' => $value['5. volume'],
                        ]);

                $tanggal_awal = Carbon::parse($request->tanggal_awal);
                $tanggal_awal->toDateTimeString();
                //mengambil input tanggal_awal

                $tanggal_akhir = Carbon::parse($request->tanggal_akhir);
                $tanggal_akhir->toDateTimeString();
                //mengambil input tanggal_akhir

                if($tanggal_akhir != $tanggal_awal){
                    $saham = Saham::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->where('emiten_id', '=', $emiten_id)->get();
                    // $saham = DB::table('sahams')
                    // ->select('*')
                    // ->where(date('tanggal'), '=', $tanggal, 'AND', 'emiten_id', '=', $emiten_id)
                    // ->orderBy('id', 'DESC')
                    // ->get();
                    // print('akhir');
                    // dd($saham, $tanggal_akhir, $tanggal_awal);
                }
                
                if($tanggal_akhir == $tanggal_awal){   

                    $expiryDate = Carbon::createFromFormat('Y-m-d H:i:s', $tanggal_awal)->endOfDay()->toDateTimeString();
                    //mengambil input tanggal_besok
                    $saham = Saham::whereBetween('tanggal', [$tanggal_awal, $expiryDate])->where('emiten_id', '=', $emiten_id)->get();
                    // print('awal');
                    // dd($saham, $tanggal_awal, $expiryDate);
                }  

                }

                // dd($array);                
                return view('sahamPage', compact('saham', 'simbol', 'count'));
            }
            
    }*/

    public function eps_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.epspage'), compact('list', 'hasil'));
    }

    public function per_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.perpage'), compact('list', 'hasil'));
    }

    public function pbv_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.pbvpage'), compact('list', 'hasil'));
    }

    public function roe_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.roepage'), compact('list', 'hasil'));
    }


    public function dy_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.dypage'), compact('list', 'hasil'));
    }
    public function der_page()
    {
        $list = Emiten::all();
        $hasil = 0;
        return view(('fundamental.derpage'), compact('list', 'hasil'));
    }
}
