<?php

namespace App\Http\Controllers;

use App\Models\Emiten;
use App\Models\Saham;
use App\Models\Valas;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Queue\Events\Looping;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Foreach_;

class SahamController extends Controller
{
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
        $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=".$simbol."&interval=5min&apikey=".$key);

            if ($response->status() !== 200) {
                return 'Conection Failed!!';
            }

            $data = json_decode($response,true);
            // dd($data);

            if (empty($data)) {
                return 'Return Empty Data';
            }

            if($data){
                $key = array_values($data);
                $array = $key[1];

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
            
    }

    public function save_intraday_stock(Request $request)
    {
        dd($request);
    }

    public function forex_page(Type $var = null)
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
        $response = Http::get("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=".$key);

            if ($response->status() !== 200) {
                return 'Conection Failed!!';
            }

            $data = json_decode($response,true);
            // dd($data);

            if (empty($data)) {
                return 'Return Empty Data';
            }

            if($data){
                $key = array_values($data);
                $array = $key[1];
                dd($array);

                // dd($array);                
                return view('sahamPage', compact('array'));
            }
            
    }

    public function daily_stock(Request $request)
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
            
    }
    
}