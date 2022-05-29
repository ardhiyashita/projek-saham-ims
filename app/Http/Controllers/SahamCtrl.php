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


class SahamCtrl extends Controller
{
  public function kurs_page()
  {
    return view('exchangePg');
  }
}
