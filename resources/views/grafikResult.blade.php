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
              <h6 class="mb-0 ">Hasil Grafik Saham</h6>
              <p class="text-sm ">Berikut merupakan grafik berdasarkan data saham dan tanggal yang Anda masukkan</p>
              <hr class="dark horizontal"              
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Awal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Close</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Akhir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Close</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saham</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Graf</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Awal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Close</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Akhir</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Close</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saham</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Graf</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $tanggal_awal }}</p>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $result_awal }}</h6>
                      </td>
                      <td>
                        <h6 class="text-xs font-weight-bold mb-0">{{ $tanggal_akhir }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $result_akhir }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $emiten->simbol }}</h6>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $graf }}</h6>
                      </td>
                    </tr>                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    @endsection