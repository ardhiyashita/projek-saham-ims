@extends('layouts.main')

@section('title', 'Rekap Saham Page')
    
@section('content')

<div class="row">
        <div class="col-12">
        <a class="btn-lg btn-primary" style="text-decoration: none;" href="{{ route('daily_stock_page') }}">Pilih Emiten Lain</a>
        <h5 style="float: right;">Count: {{ $count }}</h5>
          <div class="card my-4 mt-5">          
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Rekap Saham</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price Open</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Close</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sumber</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price Open</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Close</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sumber</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($saham as $val)
                    <tr>
                    <!-- <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $loop->index+1 }}</p>
                      </td> -->
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $val->tanggal }}</p>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm">{{ $val->open }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $val->close }}</h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm text-center">{{ $val->sumber }}</h6>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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