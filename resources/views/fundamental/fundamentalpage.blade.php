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
                        <input class="form-check-input eps" name="api" id="apieps" type="checkbox" class="apis" value="api" onclick="epscheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                EPS
                            </label>
                            </div>
                              <p class="text-sm put">
                                <b>Laba Bersih</b></p>
                                <input type="text" id="epscal1" class="form-control shadow-secondary border-2 ps-0" name="laba_bersih" disabled>
                              <p class="text-sm put">
                                <b>Jumlah Lembar Saham</b></p>
                                <input type="text" id="epscal2" class="form-control shadow-secondary border-2 ps-0" name="jumlah_lembar_saham" disabled>

                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="apiper" type="checkbox" class="apis" value="api" onclick="percheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                PER
                            </label>
                            </div>
                              <p class="text-sm put"><b>Harga Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="percal1" name="harga_saham" disabled>
                              <p class="text-sm put"><b>Laba Lembar Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="percal2" name="laba_lembar_saham" disabled>

                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="apipbv" type="checkbox" class="apis" value="api" onclick="pbvcheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                PBV
                            </label>
                            </div>
                              <p class="text-sm put"><b>Harga Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="pbvcal1" name="harga_saham" disabled>
                              <p class="text-sm put"><b>Nilai Buku Lembar Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="pbvcal2" name="nilai_buku_lembar_saham" disabled>


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="apiroe" type="checkbox" class="apis" value="api" onclick="roecheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                ROE
                            </label>
                            </div>
                              <p class="text-sm put"><b>Laba Bersih</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="roecal1" name="laba_bersih" disabled>
                              <p class="text-sm put"><b>Jumlah Lembar Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="roecal2" name="jumlah_lembar_saham" disabled>


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="apidy" type="checkbox" class="apis" value="api" onclick="dycheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                DY
                            </label>
                            </div>
                              <p class="text-sm put"><b>Dividen Lembar Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="dycal1" name="dividen_lembar_saham" disabled>
                              <p class="text-sm put"><b>Harga Saham</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="dycal2" name="harga_saham" disabled>


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="api" id="apider" type="checkbox" class="apis" value="api" onclick="dercheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                DER
                            </label>
                            </div>
                              <p class="text-sm put"><b>Hutang</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="dercal1" name="hutang" disabled>
                              <p class="text-sm put"><b>Modal Sendiri</b></p>
                                <input type="text" class="form-control shadow-secondary border-2 ps-0" id="dercal2" name="modal_sendiri" disabled>
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