@extends('layouts.main')

@section('title', 'Forex Page')
    
@section('content')

<div class="row">
        <div class="col-12">
        <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('stock_page') }}">Pilih Saham Lain</a>
          <div class="card my-4 mt-5">          
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Valas</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Open</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">High</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Low</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Close</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Open</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">High</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Low</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Close</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($array as $key=>$val)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $key }}</p>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{ $val['1. open'] }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{ $val['2. high'] }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{ $val['3. low'] }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{ $val['4. close'] }}</h6>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection