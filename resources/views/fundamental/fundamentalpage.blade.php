@extends('layouts.main')

@section('title', 'Fundamental Page')
    
@section('content')

<div class="col">
  <div class="row mt-4">
    <div class="mb-md-0 mb-4">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Rekap Fundamental</h6>
          </div>
      </div>
      <div class="card-body">
          <p class="text-sm">
            Anda dapat melakukan perhitungan terhadap data terkait fundamental saham dengan memilih jenis fundamental
            yang tersedia dan memasukkan data yang diperlukan dibawah ini
          </p>     
          <form action="{{ route('fundamental') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <div class="col-15 mb-2"> 
                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                EPS
                            </label>
                            </div>
                              <p class="text-sm put"><b>laba bersih</b></p>
                                <input type="text" name="eps">
                              <p class="text-sm put"><b>jumlah_lembar_saham</b></p>
                                <input type="text" name="eps">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                PER
                            </label>
                            </div>
                              <p class="text-sm put"><b>harga saham</b></p>
                                <input type="text" name="per">
                              <p class="text-sm put"><b>laba_lembar_saham</b></p>
                                <input type="text" name="per">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                PBV
                            </label>
                            </div>
                              <p class="text-sm put"><b>pbv</b></p>
                                <input type="text" name="pbv">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                ROE
                            </label>
                            </div>
                              <p class="text-sm put"><b>roe</b></p>
                                <input type="text" name="roe">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                DY
                            </label>
                            </div>
                              <p class="text-sm put"><b>dy</b></p>
                                <input type="text" name="dy">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                DER
                            </label>
                            </div>
                              <p class="text-sm put"><b>der</b></p>
                                <input type="text" name="der">
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
</div>
</div>

@endsection