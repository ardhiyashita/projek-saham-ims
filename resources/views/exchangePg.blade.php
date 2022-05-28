@extends('layouts.main')

@section('title', 'PBV Page')
    
@section('content')

<div class="row">
  <div class="col-12">
      <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Kurs</h6>
          </div>
      </div>
      <div class="card-body">
        <div>
          <p class="text-sm">
            
          </p>
          <div class="form-group">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
                  <div class="col-md-12">
                    <p class="text-sm put"><b>Mata Uang Asal</b></p>
                    <select name="simbol" class="form-select shadow-secondary border-2 ps-0">

                    </select>
                  </div>
                  <div class="col-md-12">
                    <p class="text-sm put"><b>Mata Uang Tujuan</b></p>
                    <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                        
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
  </div>
</div>


@endsection