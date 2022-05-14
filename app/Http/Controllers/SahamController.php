<?php

namespace App\Http\Controllers;

use App\Models\Emiten;
use App\Models\Valas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

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
            // dd($keys[1]);
            // foreach($data as $key=>$val){
            // {{ $val[0]->'open' }}
            return view('sahamPage', compact('array', 'simbol'));
        }
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
}
