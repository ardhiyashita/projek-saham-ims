@extends('layouts.main')

@section('title', 'Hasil Perhitungan')
    
@section('content')
<div class="row">
        <div class="col-12">
        <!-- <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('company_list') }}">Pilih Perusahaan Lain</a> -->
          <div class="card my-4">          
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Hasil Perhitungan Analisis Fundamental</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
              <div class="table-responsive p-0">
                <table id="example" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Perusahaan</th>
                          <th>EPS</th>
                          <th>PER</th>
                          <th>PBV</th>
                          <th>ROE</th>
                          <th>DY</th>
                          <th>DER</th>
                      </tr>
                  </thead>
                  <tbody>
                    
                      <tr>
                          <td>{{ $data->emiten->nama }} </td>
                          <td>{{ $data->eps }} </td>
                          <td>{{ $data->per }} </td>
                          <td>{{ $data->pbv }} </td>
                          <td>{{ $data->roe }} </td>
                          <td>{{ $data->dy }} </td>
                          <td>{{ $data->der }} </td>
                      </tr>
                      
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Perusahaan</th>
                          <th>EPS</th>
                          <th>PER</th>
                          <th>PBV</th>
                          <th>ROE</th>
                          <th>DY</th>
                          <th>DER</th>
                      </tr>
                  </tfoot>
              </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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