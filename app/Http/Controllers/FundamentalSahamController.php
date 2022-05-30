<?php

namespace App\Http\Controllers;

use App\Models\Emiten;
use App\Models\Fundamental;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FundamentalSahamController extends Controller
{
    public function fundamental_page()
    {
        $list = Emiten::all();
        return view('fundamental/fundamentalPage', compact('list'));
    }

    public function fundamental(Request $request)
    {
        $eps = $request->eps;
        $per = $request->per;
        $pbv = $request->pbv;
        $roe = $request->roe;
        $dy = $request->dy;
        $der = $request->der;
        $simbol = $request->simbol;

        // dd($eps, $per, $pbv, $roe, $dy, $der);
        // $fundamental = array();
        // $emiten = ['eps', 'per', 'pbv', 'roe', 'dy', 'der'];
        // $rekap = array();

        Fundamental::create([
            'emiten_id' => $simbol,
            'eps'  => "null",
            'per' => "null",
            'pbv' => "null",
            'roe' => "null",
            'dy' => "null",
            'der' => "null",
        ]);

        if($eps){
            $request->validate([
                'laba_bersih_eps' =>'required',
                'jumlah_lembar_saham_eps' =>'required',
            ]);
            $laba_bersih_eps = $request->laba_bersih_eps;
            $jumlah_lembar_saham_eps = $request->jumlah_lembar_saham_eps;
    
            //perhitungan hasil
            $hasil = $laba_bersih_eps/$jumlah_lembar_saham_eps;
            $eps_result = $laba_bersih_eps/$jumlah_lembar_saham_eps;
            // dd($hasil);
            // array_push($fundamental, $hasil);
            $data = Fundamental::orderBy('id', 'DESC')->first();
            $data->eps=$hasil;
            $data->update();
        }

        if($per){
            $request->validate([
                'eps' =>'required',
                'harga_saham_per' =>'required',
            ]);

            $harga_saham_per = $request->harga_saham_per;
            //perhitungan hasil
            $hasil = $harga_saham_per/$eps_result;
            // dd($hasil);
            // array_push($fundamental, $hasil);
            $data = Fundamental::orderBy('id', 'DESC')->get();
            $data->per=$hasil;
            $data->update();
            
        }

        if($pbv){
            $request->validate([
                'harga_saham_pbv' =>'required',
                'nilai_buku_lembar_saham_pbv' =>'required',
            ]);

            $harga_saham_pbv = $request->harga_saham_pbv;
            $nilai_buku_lembar_saham_pbv = $request->nilai_buku_lembar_saham_pbv;

            //perhitungan hasil
            $hasil = $harga_saham_pbv/$nilai_buku_lembar_saham_pbv;
            // dd($hasil);
            // array_push($fundamental, $hasil);    
            $data = Fundamental::orderBy('id', 'DESC')->get();
            $data->pbv=$hasil;
            $data->update();
                    
        }

        if($roe){
            $request->validate([
                'laba_bersih_roe' =>'required',
                'kekayaan_bersih_roe' =>'required',
            ]);

            $laba_bersih_roe = $request->laba_bersih_roe;
            $kekayaan_bersih_roe = $request->kekayaan_bersih_roe;

            //perhitungan hasil
            $hasil = $laba_bersih_roe/$kekayaan_bersih_roe;
            // dd($hasil);
            // array_push($fundamental, $hasil);   
            $data = Fundamental::orderBy('id', 'DESC')->get();
            $data->roe=$hasil;
            $data->update();
                     
        }

        if($dy){
            $request->validate([
                'dividen_lembar_saham_dy' =>'required',
                'harga_saham_dy' =>'required',
            ]);

            $dividen_lembar_saham_dy = $request->dividen_lembar_saham_dy;
            $harga_saham_dy = $request->harga_saham_dy;

            //perhitungan hasil
            $hasil = $dividen_lembar_saham_dy/$harga_saham_dy;    
            // dd($hasil);        
            // array_push($fundamental, $hasil);
            $data = Fundamental::orderBy('id', 'DESC')->get();
            $data->dy=$hasil;
            $data->update();
                   
        }

        if($der){
            $request->validate([
                'hutang_der' =>'required',
                'modal_sendiri_der' =>'required',
            ]);

            $hutang_der = $request->hutang_der;
            $modal_sendiri_der = $request->modal_sendiri_der;

            //perhitungan hasil
            $hasil = $hutang_der/$modal_sendiri_der;
            // dd($hasil);
            // array_push($fundamental, $hasil);
            $data = Fundamental::orderBy('id', 'DESC')->first();
            $data->der=$hasil;
            $data->update();
                     
        }

        if(empty($eps) and empty($per) and empty($pbv) and empty($roe) and empty($dy) and empty($der)){
            // dd($eps, $per, $pbv, $roe, $dy, $der);
            return redirect()->back()->with('error', 'Anda belum memilih option!');
        }

        // array_push($rekap, $emiten, $fundamental);
        // dd($rekap);

        return redirect()->back()->with('success', 'Analisis fundamental telah selesai dihitung!');
    }

    public function fundamental_hasil()
    {
        $data = Fundamental::orderBy('id', 'DESC')->first();
        return view('fundamental/hasil', compact('data'));
    }

    public function fundamental_rekap()
    {
        $fundamental = Fundamental::orderBy('id', 'DESC')->get();
        return view('fundamental/fundamentalRekap', compact('fundamental'));
    }

    public function eps(Request $request)
    {
        $laba_bersih = $request->laba_bersih;
        $jumlah_lembar_saham = $request->jumlah_lembar_saham;

        //perhitungan hasil
        $hasil = $laba_bersih/$jumlah_lembar_saham;

        return view('fundamental/epspage', compact('hasil'));
    }

    public function per(Request $request)
    {
        $harga_saham = $request->harga_saham;
        $laba_lembar_saham = $request->laba_lembar_saham;

        //perhitungan hasil
        $hasil = $harga_saham/$laba_lembar_saham;

        return view('fundamental/perpage', compact('hasil'));
    }


    public function pbv(Request $request)
    {
        $harga_saham = $request->harga_saham;
        $nilai_buku_lembar_saham = $request->nilai_buku_lembar_saham;

        //perhitungan hasil
        $hasil = $harga_saham/$nilai_buku_lembar_saham;

        return view('fundamental/pbvpage', compact('hasil'));
    }

    public function roe(Request $request)
    {
        $laba_bersih = $request->laba_bersih;
        $jumlah_lembar_saham = $request->jumlah_lembar_saham;

        //perhitungan hasil
        $hasil = $laba_bersih/$jumlah_lembar_saham;

        return view('fundamental/roepage', compact('hasil'));
    }

    public function dy(Request $request)
    {
        $dividen_lembar_saham = $request->dividen_lembar_saham;
        $harga_saham = $request->harga_saham;

        //perhitungan hasil
        $hasil = $dividen_lembar_saham/$harga_saham;

        return view('fundamental/dypage', compact('hasil'));
    }

    public function der(Request $request)
    {
        $hutang = $request->hutang;
        $modal_sendiri = $request->modal_sendiri;

        //perhitungan hasil
        $hasil = $hutang/$modal_sendiri;

        return view('fundamental/derpage', compact('hasil'));
    }

    
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
