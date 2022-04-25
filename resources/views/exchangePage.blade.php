@extends('layouts.master')

@section('title', 'Exchange Page')
    
@section('content')
<!-- DataTables Example -->
<!-- <div id="wrapper">
    <h1>Projek Saham</h1>
    <table id="keywords" cellspacing="0" cellpadding="0"> -->
<div class="container" style="width: 90%; margin:auto; padding: 20px; height:max-content">
    <div>
        <br>
            <h1 style="text-align: center; color:white; font-family:'Times New Roman', Times, serif;">Projek Saham - Exchange Price</h1>
            <div class="mt-5" style="display:flex; justify-content:space-between">
                <h5 style=" color:white; font-family:'Times New Roman'">Mata Uang Asal: <i>{{ $from_symbol }}</i> || Mata Uang Tujuan: <i>{{ $to_symbol }}</i></h5>
                <div class="mb-2">
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('stock_page') }}">Saham Page</a>
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('forex_page') }}">Forex Page</a>
                    <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('exchange_page') }}">Pilih Valas Lain</a>
                </div>
            </div>
        <br>
    </div>
<div class="container" style="display: grid;">
    <table style="width: 100%; margin:auto">
        <thead>
            <tr>
                <th>Waktu Refresh</th>
                <th>Mata Uang Asal</th>
                <th>Mata Uang Tujuan</th>
                <th>Kurs</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Waktu Refresh</th>
                <th>Mata Uang Asal</th>
                <th>Mata Uang Tujuan</th>
                <th>Kurs</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($array as $val)
            <tr>
                <td>{{ $val['6. Last Refreshed'] }}</td>
                <td>{{ $val['2. From_Currency Name'] }}</td>
                <td>{{ $val['4. To_Currency Name'] }}</td>
                <td>{{ $val['5. Exchange Rate'] }}</td>
                <td>{{ $val['8. Bid Price'] }}</td>
                <td>{{ $val['9. Ask Price'] }}</td>
            </tr>
            @endforeach
        </tbody>
  </table>
</div>
</div>
    <script language="javascript">
        setInterval(function(){
            window.location.reload(1);
            }, 30000);
    </script>
@endsection