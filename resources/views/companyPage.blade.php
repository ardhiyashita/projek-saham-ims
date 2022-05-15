@extends('layouts.main')

@section('title', 'Company Page')
    
@section('content')

<div class="row">
        <div class="col-12">
        <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('company_page') }}">Pilih Company Lain</a>
          <div class="card my-4 mt-5">          
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Company</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Country</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">LatestQuarter</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BookValue</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PriceToBookRatio</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PERatio</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EPS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ReturnOnEquityTTM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RevenueTTM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">GrossProfitTTM</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Country</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">LatestQuarter</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BookValue</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PriceToBookRatio</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PERatio</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EPS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ReturnOnEquityTTM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RevenueTTM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">GrossProfitTTM</th>
                    </tr>
                  </tfoot>
                  <tbody>                  
                  @foreach($array as $value)
                  <tr>
                    @if($loop->iteration > 1)
                      @break
                    @endif
                      <td> <h6 class="mb-0 text-sm">{{ $array[7] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm">{{ $array[12] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[17] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[35] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[15] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[20] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[25] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[26] }}</h6> </td>
                      <td> <h6 class="mb-0 text-sm text-center">{{ $array[27] }}</h6> </td>
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