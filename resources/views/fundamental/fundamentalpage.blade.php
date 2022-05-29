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
                      <p class="text-sm put"><b>Pilih Jenis Emiten</b></p>
                      <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                        @foreach($list as $item)
                        <option value="{{ $item->id }}" class="form-check-input" id=""
                            >{{ $item->nama }} [{{ $item->simbol }}]</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-15 mb-2"> 
                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                EPS
                            </label>
                            </div>
                              <p class="text-sm put"><b>laba_bersih</b></p>
                                <input type="text" name="laba_bersih">
                              <p class="text-sm put"><b>jumlah_lembar_saham</b></p>
                                <input type="text" name="jumlah_lembar_saham">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                PER
                            </label>
                            </div>
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" name="harga_saham">
                              <p class="text-sm put"><b>laba_lembar_saham</b></p>
                                <input type="text" name="laba_lembar_saham">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                PBV
                            </label>
                            </div>
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" name="harga_saham">
                              <p class="text-sm put"><b>nilai_buku_lembar_saham</b></p>
                                <input type="text" name="nilai_buku_lembar_saham">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                ROE
                            </label>
                            </div>
                              <p class="text-sm put"><b>laba_bersih</b></p>
                                <input type="text" name="laba_bersih">
                              <p class="text-sm put"><b>jumlah_lembar_saham</b></p>
                                <input type="text" name="jumlah_lembar_saham">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                DY
                            </label>
                            </div>
                              <p class="text-sm put"><b>dividen_lembar_saham</b></p>
                                <input type="text" name="dividen_lembar_saham">
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" name="harga_saham">


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                DER
                            </label>
                            </div>
                              <p class="text-sm put"><b>hutang</b></p>
                                <input type="text" name="hutang">
                              <p class="text-sm put"><b>modal_sendiri</b></p>
                                <input type="text" name="modal_sendiri">
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