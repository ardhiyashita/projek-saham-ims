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
use Maatwebsite\Excel\Facades\Excel;
use SheetDB\SheetDB;

class SahamCtrl extends Controller
{
  public function kurs_page()
  {
    return view('exchangePg');
  }

  public function getdb(Request $request)
  {    
    $data = RekapSaham::where('sumber', '=', 'Google Finance')->orderBy('id', 'DESC')->first();

    $before = $data->emiten->simbol;
    // dd($before);
    // $before = 'TLKM';
    $after = $request->simbol;
    // dd($after);
    // $after = 'AALI';
    $emiten_id = Emiten::where('simbol', '=', $after)->first();

    $sheetdb = new SheetDB('ilcgt8bffknzb');
    $sheetdb->update('Kode Perusahaan', $before, ['Kode Perusahaan' => $after]);
    $response = $sheetdb->get();

    // dd($response);

    $result = json_encode($response, true);
    $hasil = json_decode($result , true);
    
    foreach($hasil as $val){
      $tanggal = Carbon::parse($val['Date']);
      $date = date('Y-m-d', strtotime($tanggal));
      
      $grab_saham[] = [
          'emiten_id' => $emiten_id->id,
          'tanggal' => $date,
          'open' => $val['Open'],
          'close' => $val['Close'],
          'sumber' => 'Google Finance',

          // 'user_id' => Sentinel::getUser()->id,
          // 'en_answer' => $request->en_answer[$i],
          // 'question_id' => $request->question_id[$i]
      ];
    }
    RekapSaham::insert($grab_saham);

    return redirect()->back()->with('success', "Data berhasil dimasukkan!");
  }

  public function grafikPage()
  {
    $nilai = DB::table('rekap_sahams')->distinct()->pluck('emiten_id');    
    $list = RekapSaham::select('emiten_id')->whereIn('emiten_id',$nilai)->distinct()->get();
    
    return view('grafikPage', compact('list'));
  }

  public function grafik(Request $request)
  {
    $emiten_id = $request->simbol;
    $emiten = Emiten::where('id', '=', $emiten_id)->select('simbol')->first();
    $tanggal_awal = Carbon::parse($request->tanggal_awal);
    // $tanggal_awal->toDateTimeString();
    //mengambil input tanggal_awal

    $tanggal_akhir = Carbon::parse($request->tanggal_akhir);
    // $tanggal_akhir->toDateTimeString();
    //mengambil input tanggal_akhir

    if ($tanggal_akhir != $tanggal_awal) {
        $awal = RekapSaham::whereDate('tanggal', date($tanggal_awal))->where('emiten_id', '=', $emiten_id)->get();
        $akhir = RekapSaham::whereDate('tanggal', date($tanggal_akhir))->where('emiten_id', '=', $emiten_id)->get();
        
        if(count($awal)<1){
          return redirect()->back()->with('error', 'Data saham tanggal awal tidak ada!');
        }
        if(count($akhir)<1){
          return redirect()->back()->with('error', 'Data saham tanggal akhir tidak ada!');
        }

        // whereDate('created_at', date('Y-m-d'))
        foreach($awal as $awals){
          $result_awal = $awals->close;
        }
        foreach($akhir as $akhirs){
          $result_akhir = $akhirs->close;
        }

        // dd($akhir, $awal);
        // dd($result_akhir, $result_awal);
        if($result_awal < $result_akhir){
          $graf = 'naik';
        }elseif($result_awal > $result_akhir){
          $graf = 'turun';
        }else{
          $graf = 'seimbang';
        }
    }

    if ($tanggal_akhir == $tanggal_awal) {
        return redirect()->back()->with('error', 'Masukkan data tanggal dengan benar!');
    }
    // dd($graf);
    return view('grafikResult', compact('tanggal_awal', 'tanggal_akhir', 'result_akhir', 'result_awal',  'emiten', 'graf'));
  }

}
