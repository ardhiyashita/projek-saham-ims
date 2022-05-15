@extends('layouts.main')

@section('title', 'Daftar Perusahaan')
    
@section('content')

<div class="row">
        <div class="col-12">
        <!-- <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('company_list') }}">Pilih Perusahaan Lain</a> -->
          <div class="card my-4">          
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Daftar Perusahaan</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
      <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Exchange</th>
                <th>Asset Type</th>
                <th>Ipo Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach($list as $val)
            <tr>
                <td>{{ $val->simbol }} </td>
                <td>{{ $val->nama }} </td>
                <td>{{ $val->exchange }} </td>
                <td>{{ $val->assetType }} </td>
                <td>{{ $val->ipoDate }} </td>
                <td>{{ $val->status }} </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Exchange</th>
                <th>Asset Type</th>
                <th>Ipo Date</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
      
    <!-- <script src="./assets/js/datatable.js"></script>
  <script src="./assets/js/datatable2.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
@endsection