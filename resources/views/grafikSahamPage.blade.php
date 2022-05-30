@extends('layouts.main')
<title>Bar Chart</title>
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<style>
    canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    }
</style>
@section('title', 'Sayur Box | Master')

@section('content')

    
    </div>
    <div class="container-fluid mt-4">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading ">
                    <p class="panel-subtitle" style="font-weight: bold">Periode: {{ date('d-m-Y H:m:s', strtotime($now)) }}</p>
                </div>
                
                <div class="panel-body mt-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $monthlySales }}</span>
                                    <span class="title">Penjualan Bulanan</span>
                                </p>
                               
                                <div class="weekly-summary">
                                    <span class="number">Rp{{ number_format($incomeMonthly) }}</span>
                                    <span class="info-label">Pendapatan Bulanan</span>
                                </div>
                             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">{{ $annualSales }}</span>
                                    <span class="title">Penjualan Tahunan</span>
                                    
                                </p>

                                <div class="weekly-summary ">
                                    <span class="number">Rp{{ number_format($incomeAnnual) }}</span>
                                    <span class="info-label">Pendapatan Tahunan</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </span>
                                <p>
                                    <span class="number">{{ $allSales }}</span>
                                    <span class="title">Total Penjualan</span>
                                </p>
                                <div class="weekly-summary">
                                    <span class="number">Rp{{ number_format($incomeTotal) }}</span>
                                    <span class="info-label">Total Pendapatan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
                </div>
            </div>
        </div>

@endsection