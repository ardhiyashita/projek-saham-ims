<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundamentalSahamController extends Controller
{
    public function fundamental_page(Request $request)
    {
        return view('fundamental/fundamentalpage');
    }

    public function fundamental(Request $request)
    {
        return view('fundamental/fundamentalpage');
    }

    public function eps_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/epspage', compact('hasil'));
    }

    public function eps(Request $request)
    {
        $laba_bersih = $request->laba_bersih;
        $jumlah_lembar_saham = $request->jumlah_lembar_saham;

        //perhitungan hasil
        $hasil = $laba_bersih/$jumlah_lembar_saham;

        return view('fundamental/epspage', compact('hasil'));
    }

    public function per_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/perpage', compact('hasil'));
    }

    public function per(Request $request)
    {
        $harga_saham = $request->harga_saham;
        $laba_lembar_saham = $request->laba_lembar_saham;

        //perhitungan hasil
        $hasil = $harga_saham/$laba_lembar_saham;

        return view('fundamental/perpage', compact('hasil'));
    }

    public function pbv_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/pbvpage', compact('hasil'));
    }

    public function pbv(Request $request)
    {
        $harga_saham = $request->harga_saham;
        $nilai_buku_lembar_saham = $request->nilai_buku_lembar_saham;

        //perhitungan hasil
        $hasil = $harga_saham/$nilai_buku_lembar_saham;

        return view('fundamental/pbvpage', compact('hasil'));
    }

    public function roe_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/roepage', compact('hasil'));
    }

    public function roe(Request $request)
    {
        $laba_bersih = $request->laba_bersih;
        $jumlah_lembar_saham = $request->jumlah_lembar_saham;

        //perhitungan hasil
        $hasil = $laba_bersih/$jumlah_lembar_saham;

        return view('fundamental/roepage', compact('hasil'));
    }


    public function dy_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/dypage', compact('hasil'));
    }

    public function dy(Request $request)
    {
        $dividen_lembar_saham = $request->dividen_lembar_saham;
        $harga_saham = $request->harga_saham;

        //perhitungan hasil
        $hasil = $dividen_lembar_saham/$harga_saham;

        return view('fundamental/dypage', compact('hasil'));
    }

    public function der_page(Request $request)
    {
        $hasil = "-";
        return view('fundamental/derpage', compact('hasil'));
    }

    public function der(Request $request)
    {
        $hutang = $request->hutang;
        $modal_sendiri = $request->modal_sendiri;

        //perhitungan hasil
        $hasil = $hutang/$modal_sendiri;

        return view('fundamental/derpage', compact('hasil'));
    }
}
