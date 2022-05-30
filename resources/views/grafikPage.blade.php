@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">

        </div>
      </div>
      <div class="row mt-4">
        <div class="col mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="50">
                       
                  </canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="text-white">{{ session('error') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
              <h6 class="mb-0 ">Data Grafik</h6>
              <p class="text-sm ">Silakan masukkan data dibawah ini untuk proses selanjutnya</p>
              <hr class="dark horizontal">
              <div class="col-md-6">
                <form action="{{ route('grafik') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="card card-primary">
                    <div class="mb-4"> Dari Tanggal (From)
                        <input type="date" name="tanggal_awal" class="form-select shadow-secondary border-2 ps-0">
                        Sampai Tanggal (To)
                        <input type="date" name="tanggal_akhir" class="form-select shadow-secondary border-2 ps-0">
                    </div>
                    <!-- <h4 class="col-md-12 mb-0" style="color:white; font-family:'Times New Roman'">Pilih Jenis Emiten</h4> -->
                    <div class=""> Pilih Jenis Emiten
                        <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                            @foreach($list as $item)
                            <option value="{{ $item->emiten_id }}" class="form-check-input" id=""
                                >{{ $item->emiten->nama }} [{{ $item->emiten->simbol }}]</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- <a class="btn btn-primary mt-2" style="text-decoration: none;" href="{{ route('back') }}">Back</a> -->
                    <!-- @error('category_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror -->   
                    </div>       
                </div>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    @endsection