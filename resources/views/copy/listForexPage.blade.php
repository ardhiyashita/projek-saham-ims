@extends('layouts.master')

@section('title', 'List Forex Page')
    
@section('content')
<!-- DataTables Example -->
<!-- <div id="wrapper">
    <h1>Projek Saham</h1>
    <table id="keywords" cellspacing="0" cellpadding="0"> -->
<div class="container" style="width: 90%; margin:auto;  padding: 20px;">
    <div>
        <br>
        <h1 style="text-align: center; color:white; font-family:'Times New Roman', Times, serif;">Projek Saham - Forex</h1>
        <br>
    </div>
    <div>
    <form action="{{ route('intraday_forex') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <h4 class="col-md-12 mb-0" style="color:white; font-family:'Times New Roman'">Mata Uang Asal</h4>
            <div class="col-md-12">
                <select name="from_symbol" class="form-select shadow-none border-0 ps-0">
                    @foreach($list as $item)
                    <option value="{{ $item->kode_valas }}" class="form-check-input" id=""
                        >{{ $item->nama_valas }} [{{ $item->kode_valas }}]</option>
                    @endforeach
                </select>
            </div>

            <br>
            <h4 class="col-md-12 mb-0" style="color:white; font-family:'Times New Roman'">Mata Uang Tujuan</h4>
            <div class="col-md-12">
                <select name="to_symbol" class="form-select shadow-none border-0 ps-0">
                    @foreach($list as $item)
                    <option value="{{ $item->kode_valas }}" class="form-check-input" id=""
                        >{{ $item->nama_valas }} [{{ $item->kode_valas }}]</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary mt-2" type="submit">Submit</button>
            <!-- <a class="btn btn-primary mt-2" style="text-decoration: none;" href="{{ url()->previous() }}">Back</a> -->
            <!-- @error('category_name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror -->
        </div>
    </form>
    </div>
</div>

@endsection