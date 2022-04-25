@extends('layouts.main')

@section('title', 'List Saham Page')
    
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Pilih Jenis Emiten</h6>
            </div>
        </div>
        <div class="card-body">
        <!-- <div>
            <br>
            <h1 style="text-align: center; color:white; font-family:'Times New Roman', Times, serif;">Projek Saham - Stock</h1>
            <br>
        </div> -->
            <form action="{{ route('intraday_stock') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <!-- <h4 class="col-md-12 mb-0" style="color:white; font-family:'Times New Roman'">Pilih Jenis Emiten</h4> -->
                    <div class="col-md-12">
                        <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                            @foreach($list as $item)
                            <option value="{{ $item->simbol }}" class="form-check-input" id=""
                                >{{ $item->nama }} [{{ $item->simbol }}]</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                    <!-- <a class="btn btn-primary mt-2" style="text-decoration: none;" href="{{ route('back') }}">Back</a> -->
                    <!-- @error('category_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror -->
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- DataTables Example -->
<!-- <div id="wrapper">
    <h1>Projek Saham</h1>
    <table id="keywords" cellspacing="0" cellpadding="0"> -->
<!-- <div class="container" style="width: 90%; margin:auto;  padding: 20px;">
    
</div> -->

@endsection