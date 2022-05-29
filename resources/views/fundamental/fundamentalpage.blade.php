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
                        <input class="form-check-input" name="eps" type="checkbox" value="eps">
                            <label class="form-check-label" for="flexCheckDefault">
                                EPS
                            </label>
                            </div>
                              <p class="text-sm put"><b>laba_bersih</b></p>
                                <input type="text" class="form-control mt-1 @error('laba_bersih_eps') is-invalid @enderror" name="laba_bersih_eps" value="{{ old('laba_bersih_eps') }}" autofocus>
                                @error('laba_bersih_eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>jumlah_lembar_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('jumlah_lembar_saham_eps') is-invalid @enderror" name="jumlah_lembar_saham_eps" value="{{ old('jumlah_lembar_saham_eps') }}" autofocus>
                                @error('jumlah_lembar_saham_eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="per" type="checkbox" value="per">
                            <label class="form-check-label" for="flexCheckDefault">
                                PER
                            </label>
                            </div>
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('eps') is-invalid @enderror" name="harga_saham_per" value="{{ old('harga_saham_per') }}" autofocus>
                                @error('eps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="pbv" type="checkbox" value="pbv">
                            <label class="form-check-label" for="flexCheckDefault">
                                PBV
                            </label>
                            </div>
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('harga_saham_pbv') is-invalid @enderror" name="harga_saham_pbv" value="{{ old('harga_saham_pbv') }}" autofocus>
                                @error('harga_saham_pbv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>nilai_buku_lembar_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('nilai_buku_lembar_saham_pbv') is-invalid @enderror" name="nilai_buku_lembar_saham_pbv" value="{{ old('nilai_buku_lembar_saham_pbv') }}" autofocus>
                                @error('nilai_buku_lembar_saham_pbv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="roe" type="checkbox" value="roe">
                            <label class="form-check-label" for="flexCheckDefault">
                                ROE
                            </label>
                            </div>
                              <p class="text-sm put"><b>laba_bersih_roe</b></p>
                                <input type="text" class="form-control mt-1 @error('laba_bersih_roe') is-invalid @enderror" name="laba_bersih_roe" value="{{ old('laba_bersih_roe') }}" autofocus>
                                @error('laba_bersih_roe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>jumlah_lembar_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('kekayaan_bersih_roe') is-invalid @enderror" name="kekayaan_bersih_roe" value="{{ old('kekayaan_bersih_roe') }}" autofocus>
                                @error('kekayaan_bersih_roe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="dy" type="checkbox" value="dy">
                            <label class="form-check-label" for="flexCheckDefault">
                                DY
                            </label>
                            </div>
                              <p class="text-sm put"><b>dividen_lembar_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('dividen_lembar_saham_dy') is-invalid @enderror" name="dividen_lembar_saham_dy" value="{{ old('dividen_lembar_saham_dy') }}" autofocus>
                                @error('dividen_lembar_saham_dy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>harga_saham</b></p>
                                <input type="text" class="form-control mt-1 @error('harga_saham_dy') is-invalid @enderror" name="harga_saham_dy" value="{{ old('harga_saham_dy') }}" autofocus>
                                @error('harga_saham_dy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                        <div class="form-check mt-3">
                        <input class="form-check-input" name="der" type="checkbox" value="der">
                            <label class="form-check-label" for="flexCheckDefault">
                                DER
                            </label>
                            </div>
                              <p class="text-sm put"><b>hutang / kewajiban</b></p>
                                <input type="text" class="form-control mt-1 @error('hutang_der') is-invalid @enderror" name="hutang_der" value="{{ old('hutang_der') }}" autofocus>
                                @error('hutang_der')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              <p class="text-sm put"><b>modal_sendiri / kekayaan_bersih</b></p>
                                <input type="text" class="form-control mt-1 @error('modal_sendiri_der') is-invalid @enderror" name="modal_sendiri_der" value="{{ old('modal_sendiri_der') }}" autofocus>
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