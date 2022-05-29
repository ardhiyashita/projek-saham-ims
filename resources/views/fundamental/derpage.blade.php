@extends('layouts.main')

@section('title', 'DER Page')
    
@section('content')

<div class="row">
  <div class="col-12">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">DER (Debt to Equity Ratio)</h6>
          </div>
      </div>
      <div class="card-body">
        <div>
          <p class="text-sm">
            DER atau yang dapat dikenal sebagai <i> Debt to Equity Ratio </i> adalah rasio dari jumlah hutang serta kewajiban yang dimiliki perusahaan dibandingkan dengan modal bersihnya. berikut ini merupakan 
            rumus yang digunakan dalam perhitungan DER ini. 
          </p>     
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Rumus DER</h6>
            </div>
        </div>
        <div class="card-body">
          <div>
            <h6 class="mb-0" style="text-align: center;">DER = Total Kewajiban (Hutang) : Kekayaan Bersih (Modal Sendiri)</h6>          
          </div>
        </div>
    </div>
  </div>
</div>
<div class="col">
  <div class="row mt-4">
    <div class="col-lg-7 col-md-6 mb-md-0 mb-4">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Kalkulator DER</h6>
          </div>
      </div>
      <div class="card-body">
          <p class="text-sm">
            Anda dapat melakukan perhitungan terhadap besarnya DER dengan masukkan data yang diperlukan dibawah ini
          </p>     
          <form action="{{ route('der') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <div class="col-15 mb-2"> 
                      <p class="text-sm put"><b>Pilih Jenis Emiten</b></p>
                      <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                        @foreach($list as $item)
                        <option value="{{ $item->id }}" class="form-check-input" id=""
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
  <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Hasil Perhitungan DER</h6>
        </div>
    </div>
    <div class="card-body">
        <p class="text-sm">
          Anda dapat melihat hasil perhitungan terhadap besarnya DER berdasarkan data yang anda masukkan tadi.
        </p>
        <div>
          <h2 class="mb-0 calceps" style="text-align: center;">{{ $hasil }}</h2>          
        </div>  
    </div>
  </div>
</div>
</div>
</div>

@endsection