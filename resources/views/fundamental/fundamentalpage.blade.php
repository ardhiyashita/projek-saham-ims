@extends('layouts.main')

@section('title', 'Fundamental Page')
    
@section('content')

<div class="col">
<a href="{{ route('fundamental_rekap') }}" class="btn btn-primary mt-3">Lihat Rekap Fundametal Saat Ini</a>
  <div class="row mt-2">
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

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-white">{{ session('success') }} Silakan klik
                <a href="{{ route('fundamental_hasil') }}">link ini</a>
                untuk melihat hasil</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="text-white">{{ session('error') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

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
                    <div class="form-group">
                        <div class="form-check mt-3">
                        <input class="form-check-input" name="eps" id="apieps" type="checkbox" value="eps" onclick="epscheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                EPS
                            </label>
                            </div>
                              <p class="text-sm put"><b>Laba Bersih</b></p>
                                <input type="text" id="epscal1" class="form-control shadow-secondary border-2 ps-0 @error('laba_bersih_eps') is-invalid @enderror" name="laba_bersih_eps" value="{{ old('laba_bersih_eps') }}" autofocus disabled>
                                @error('laba_bersih_eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>Jumlah Lembar Saham</b></p>
                                <input type="text" id="epscal2" class="form-control shadow-secondary border-2 ps-0 @error('jumlah_lembar_saham_eps') is-invalid @enderror" name="jumlah_lembar_saham_eps" value="{{ old('jumlah_lembar_saham_eps') }}" autofocus disabled>
                                @error('jumlah_lembar_saham_eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                        <div class="form-check mt-3">
                        <input class="form-check-input" id="apiper" name="per" type="checkbox" value="per" onclick="percheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                PER
                            </label>
                            </div>
                              <p class="text-sm put"><b>Harga Saham</b></p>
                                <input type="text" id="percal1" class="form-control shadow-secondary border-2 ps-0 @error('eps') is-invalid @enderror" name="harga_saham_per" value="{{ old('harga_saham_per') }}" autofocus disabled>
                                @error('eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" id="apipbv" name="pbv" type="checkbox" value="pbv" onclick="pbvcheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                PBV
                            </label>
                            </div>
                              <p class="text-sm put"><b>Harga Saham</b></p>
                                <input type="text" id="pbvcal1" class="form-control shadow-secondary border-2 ps-0 @error('harga_saham_pbv') is-invalid @enderror" name="harga_saham_pbv" value="{{ old('harga_saham_pbv') }}" autofocus disabled>
                                @error('harga_saham_pbv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>Nilai Buku Lembar Saham</b></p>
                                <input type="text" id="pbvcal2" class="form-control shadow-secondary border-2 ps-0 @error('nilai_buku_lembar_saham_pbv') is-invalid @enderror" name="nilai_buku_lembar_saham_pbv" value="{{ old('nilai_buku_lembar_saham_pbv') }}" autofocus disabled>
                                @error('nilai_buku_lembar_saham_pbv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                        <div class="form-check mt-3">
                        <input class="form-check-input" id="apiroe" name="roe" type="checkbox" value="roe" onclick="roecheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                ROE
                            </label>
                            </div>
                              <p class="text-sm put"><b>Laba Bersih Roe</b></p>
                                <input type="text" id="roecal1" class="form-control shadow-secondary border-2 ps-0  @error('laba_bersih_roe') is-invalid @enderror" name="laba_bersih_roe" value="{{ old('laba_bersih_roe') }}" autofocus disabled>
                                @error('laba_bersih_roe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>Jumlah Lembar Saham</b></p>
                                <input type="text"  id="roecal2" class="form-control shadow-secondary border-2 ps-0  @error('kekayaan_bersih_roe') is-invalid @enderror" name="kekayaan_bersih_roe" value="{{ old('kekayaan_bersih_roe') }}" autofocus disabled>
                                @error('kekayaan_bersih_roe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                        <div class="form-check mt-3">
                        <input class="form-check-input" id="apidy" name="dy" type="checkbox" value="dy" onclick="dycheck()" />
                            <label class="form-check-label" for="flexCheckDefault">
                                DY
                            </label>
                            </div>
                              <p class="text-sm put"><b>Dividen Lembar Saham</b></p>
                                <input type="text" id="dycal1" class="form-control shadow-secondary border-2 ps-0 @error('dividen_lembar_saham_dy') is-invalid @enderror" name="dividen_lembar_saham_dy" value="{{ old('dividen_lembar_saham_dy') }}" autofocus disabled>
                                @error('dividen_lembar_saham_dy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" id="dycal2" class="form-control shadow-secondary border-2 ps-0 @error('harga_saham_dy') is-invalid @enderror" name="harga_saham_dy" value="{{ old('harga_saham_dy') }}" autofocus disabled>
                                @error('harga_saham_dy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" id="apider" name="der" type="checkbox" value="der" onclick="dercheck()">
                            <label class="form-check-label" for="flexCheckDefault">
                                DER
                            </label>
                            </div>
                              <p class="text-sm put"><b>Hutang / Kewajiban</b></p>
                                <input type="text" id="dercal1" class="form-control shadow-secondary border-2 ps-0 @error('hutang_der') is-invalid @enderror" name="hutang_der" value="{{ old('hutang_der') }}" autofocus disabled>
                                @error('hutang_der')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>Modal Sendiri / Kekayaan Bersih</b></p>
                                <input type="text" id="dercal2" class="form-control shadow-secondary border-2 ps-0 @error('modal_sendiri_der') is-invalid @enderror" name="modal_sendiri_der" value="{{ old('modal_sendiri_der') }}" autofocus disabled>
                                @error('modal_sendiri_der')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div>
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