@extends('layouts.main')

@section('title', 'PBV Page')
    
@section('content')

<div class="row">
  <div class="col-12">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">PBV (Price to Book Value)</h6>
          </div>
      </div>
      <div class="card-body">
        <div>
          <p class="text-sm">
            PBV atau yang dapat dikenal sebagai <i> Price to Book Value </i> adalah rasio yang memberi gambaran terhadap besarnya pasar dalam menilai harga suatu perusahaan yang dibandingkan dengan kekayaan bersihnya. Berikut ini merupakan 
            rumus yang digunakan dalam perhitungan PBV ini. 
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
              <h6 class="text-white text-capitalize ps-3">Rumus PBV</h6>
            </div>
        </div>
        <div class="card-body">
          <div>
            <h6 class="mb-0" style="text-align: center;">PBV = Harga Saham : Nilai Buku per Lembar Saham (BV)</h6>          
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
            <h6 class="text-white text-capitalize ps-3">Kalkulator PBV</h6>
          </div>
      </div>
      <div class="card-body">
          <p class="text-sm">
            Anda dapat melakukan perhitungan terhadap besarnya PBV dengan masukkan data yang diperlukan dibawah ini
          </p>     
          <form action="" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <div class="col-3 mb-4"> <p class="text-sm put"><b>Harga Saham</b></p>
                      <input type="number" name="harga_saham" class="form-control shadow-secondary border-2 input">
                      <label class="text-sm put"><b>Nilai Buku per Lembar Saham</b></label>
                      <input type="number" name="nilai_buku_lembar_saham" class="form-control shadow-secondary border-2 input">
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
          <h6 class="text-white text-capitalize ps-3">Hasil Perhitungan PBV</h6>
        </div>
    </div>
    <div class="card-body">
        <p class="text-sm">
          Anda dapat melihat hasil perhitungan terhadap besarnya PBV berdasarkan data yang anda masukkan tadi.
        </p>
        <div>
          <h2 class="mb-0 calceps" style="text-align: center;">100 x</h2>          
        </div>  
    </div>
  </div>
</div>
</div>
</div>

@endsection