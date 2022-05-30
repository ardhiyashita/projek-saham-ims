@extends('layouts.main')

@section('title', 'List Rekap Saham Page')
    
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Data Rekap Saham</h6>
            </div>
        </div>
        <div class="card-body">
        
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-white">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <form action="{{ route('daily_stock') }}" method="POST" enctype="multipart/form-data">
            @csrf
            Pilih Jenis Inputan
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card card-primary">
                    <div class="form-check">
                        <input class="form-check-input" name="api" id="api" type="checkbox" class="apis" value="api">
                            <label class="form-check-label" for="flexCheckDefault">
                                API
                            </label>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card card-primary">
                    <div class="form-check">
                        <input class="form-check-input" name="excel" id="excel" type="checkbox" class="excels" value="excel">
                            <label class="form-check-label" for="flexCheckDefault">
                                Excel
                            </label>
                    </div>
                    </div>
                </div>                    

                <div class="col-md-6">
                    <div class="card card-primary">
                    <div class="mb-4"> Dari Tanggal (From)
                        <input type="date" name="tanggal_awal" class="form-select shadow-secondary border-2 ps-0">
                        Sampai Tanggal (To)
                        <input type="date" name="tanggal_akhir" class="form-select shadow-secondary border-2 ps-0">
                    </div>
                    <!-- <h4 class="col-md-12 mb-0" style="color:white; font-family:'Times New Roman'">Pilih Jenis Emiten</h4> -->
                    <div class=""> Pilih Jenis Emiten
                        <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                            @foreach($list as $item)
                            <option value="{{ $item->id }}" class="form-check-input" id=""
                                >{{ $item->nama }} [{{ $item->simbol }}]</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- <a class="btn btn-primary mt-2" style="text-decoration: none;" href="{{ route('back') }}">Back</a> -->
                    <!-- @error('category_name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror -->   
                    </div>       
                </div>

                <div class="col-md-6">                    
                    <div class="card card-primary" style="height: 100%;">
                        <div class=""> Input File Excel Saham
                            <input type="file" name="files" class="form-select shadow-secondary border-2 ps-0">
                        </div>
                        <div class=""> Pilih Jenis Emiten
                        <select name="simbol" class="form-select shadow-secondary border-2 ps-0">
                            @foreach($list as $item)
                            <option value="{{ $item->simbol }}" class="form-check-input" id=""
                                >{{ $item->nama }} [{{ $item->simbol }}]</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pengambilan Data Saham</h6>
              </div>
          </div>
          <div class="card-body">
            <p class="text-sm">
                Anda dapat melakukan pengambilan data saham dalam kurun waktu tertentu. Silahkan lengkapi data yang tersedia dibawah ini.
            </p>     
            <div>
                <form action="{{ route('getdb') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <p class="text-sm put"><b>Pilih Jenis Emiten</b></p>
                            <select class="form-select shadow-secondary border-2 ps-0" id="emiten" name="simbol">
                                @foreach($list as $item)
                                <option value="{{ $item->simbol }}" class="form-check-input" id=""
                                    >{{ $item->nama }} [{{ $item->simbol }}]</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>          
            </div>
          </div>
      </div>
    </div>
    
<!-- DataTables Example -->
<!-- <div id="wrapper">
    <h1>Projek Saham</h1>
    <table id="keywords" cellspacing="0" cellpadding="0"> -->
<!-- <div class="container" style="width: 90%; margin:auto;  padding: 20px;">
    
</div> -->
@section('js')
    <script type="text/javascript">
        function pilih(){            
            var api = $('input:checkbox:checked.apis').map(function(){
                return this.value; }).get().join(",");
            var excel = $('input:checkbox:checked.excels').map(function(){
                return this.value; }).get().join(",");
            $.ajax({
                url:"{{ route('daily_stock') }}",
                method: 'post',
                data:"api=" + api + "&excel=" + excel,
                success: function(){
                    location.reload(true);
                }
            });
        }

    </script>
@endsection

@endsection