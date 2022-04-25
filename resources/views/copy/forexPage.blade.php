@extends('layouts.master')

@section('title', 'Forex Page')
    
@section('content')
<!-- DataTables Example -->
<!-- <div id="wrapper">
    <h1>Projek Saham</h1>
    <table id="keywords" cellspacing="0" cellpadding="0"> -->
<div class="container" style="width: 90%; margin:auto; padding: 20px; height:max-content">
    <div>
        <br>
            <h1 style="text-align: center; color:white; font-family:'Times New Roman', Times, serif;">Projek Saham - Forex</h1>
            <div class="mt-5" style="display:flex; justify-content:space-between">
                <h5 style=" color:white; font-family:'Times New Roman'">Mata Uang Asal: <i>{{ $from_symbol }}</i> || Mata Uang Tujuan: <i>{{ $to_symbol }}</i></h5>
                <div class="mb-2">
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('exchange_page') }}">Exchange Page</a>
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('stock_page') }}">Saham Page</a>
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('forex_page') }}">Pilih Valas Lain</a>
                </div>
            </div>
        <br>
    </div>
<div class="container" style="display: grid;">
    <table style="width: 100%; margin:auto">
        <thead>
            <tr>
                <th>Key</th>
                <th>Open</th>
                <th>High</th>
                <th>Low</th>
                <th>Close</th>
            </tr>
            </thead>
            <tfoot>
        <tr>
                <th>Key</th>
                <th>Open</th>
                <th>High</th>
                <th>Low</th>
                <th>Close</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($array as $key=>$val)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $val['1. open'] }}</td>
                <td>{{ $val['2. high'] }}</td>
                <td>{{ $val['3. low'] }}</td>
                <td>{{ $val['4. close'] }}</td>
            </tr>
            @endforeach
        </tbody>
  </table>
</div>
</div>
@endsection