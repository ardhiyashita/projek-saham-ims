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

  public function graph_page(){
    
    $list = Emiten::all();
    return view('grafikPage', compact('list'));
    
  }

  public function getdb()
  {
    $codecom = "AALI";
    $codenoma = "ACES";
    $sheetdb = new SheetDB('ilcgt8bffknzb');
    $sheetdb->update('Kode Perusahaan', $codecom, ['Kode Perusahaan' => $codenoma]);
    $response = $sheetdb->get();
    dd($response);
  }
}
