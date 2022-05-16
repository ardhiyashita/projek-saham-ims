@extends('layouts.main')

@section('title', 'PER Page')
    
@section('content')

<div class="row">
  <div class="col-12">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">PER (Price to Earning Ratio)</h6>
          </div>
      </div>
      <div class="card-body">
        <div>
          <p class="text-sm">
            PER atau yang dapat dikenal sebagai <i> Price to Earning Ratio </i> adalah yang memberikan gambaran keuntungan pada suatu perusahaan yang dibandingkan dengan harga sahamnya. Berikut ini merupakan 
            rumus yang digunakan dalam perhitungan PER ini. 
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
              <h6 class="text-white text-capitalize ps-3">Rumus PER</h6>
            </div>
        </div>
        <div class="card-body">
          <div>
            <h6 class="mb-0" style="text-align: center;">PER = Harga Saham : Laba per Lembar Saham (EPS)</h6>          
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
            <h6 class="text-white text-capitalize ps-3">Kalkulator PER</h6>
          </div>
      </div>
      <div class="card-body">
          <p class="text-sm">
            Anda dapat melakukan perhitungan terhadap besarnya PER dengan masukkan data yang diperlukan dibawah ini
          </p>     
          <form action="" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <div class="col-3 mb-4"> <p class="text-sm put"><b>Harga Saham</b></p>
                      <input type="number" name="harga_saham" class="form-control shadow-secondary border-2 input">
                      <label class="text-sm put"><b>Laba per Lembar Saham</b></label>
                      <input type="number" name="laba_lembar_saham" class="form-control shadow-secondary border-2 input">
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
          <h6 class="text-white text-capitalize ps-3">Hasil Perhitungan PER</h6>
        </div>
    </div>
    <div class="card-body">
        <p class="text-sm">
          Anda dapat melihat hasil perhitungan terhadap besarnya PER berdasarkan data yang anda masukkan tadi.
        </p>
        <div>
          <h2 class="mb-0 calceps" style="text-align: center;">100x</h2>          
        </div>  
    </div>
  </div>
</div>
</div>
</div>

@endsection