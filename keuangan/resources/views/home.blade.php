@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-center text-white">Dasbor</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row py-3 mb-3 border-bottom bg-light">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body bg-secondary text-white">
                                    <h5 class="card-title"> <i class="fa fa-money fa-lg" aria-hidden="true"></i> Total Transaksi</h5>
                                    <p class="card-text">Periode {{$bulan_ini}}</p>
                                    <a href="#" class="btn btn-light">{!! "Rp ".number_format($totaltransaksi->sum('nominal')).",00" !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body bg-success text-white">
                                    <h5 class="card-title"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i> Total Pemasukan</h5>
                                    <p class="card-text">Periode {!! $bulan_ini !!}</p>
                                    <a href="#" class="btn btn-light">{!! "Rp ".number_format($jml_pemasukan->sum()).",00" !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body bg-danger text-white">
                                    <h5 class="card-title"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> Total Pengeluaran</h5>
                                    <p class="card-text">Periode {!! $bulan_ini !!}</p>
                                    <a href="#" class="btn btn-light">{!! "Rp ".number_format($jml_pengeluaran->sum()).",00" !!}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 text-center mb-2">
                            <h6 class="mb-0 p-2">{{$bulan_ini}}</h6>
                            <canvas id="myChart" width="50" height="50"></canvas>                           
                        </div>
                        <div class="col-6 text-center">
                            <h6 class="mb-0 p-2">{{$bulan_ini}}</h6>
                            <canvas id="myChart2" width="200" height="130"></canvas>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // dasbor pemasukan pengeluaran bulan ini
        $("#dasbor").addClass('active');

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pengeluaran','Pemasukan'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$jml_pengeluaran->sum()}}, {{$jml_pemasukan->sum()}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                layout: {
                    padding: 0
                },
            }
        });


        // chart 2
        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [ {!! $nama_kategori !!} ],
                datasets: [{
                    label: 'Analisis Biaya',
                    data: [ {!! $jmlh_perbiaya !!} ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(147, 207, 130, 0.8)',
                        'rgba(138, 157, 222, 0.8)',
                        'rgba(173, 49, 204, 0.8)',
                        'rgba(145, 86, 141, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                        y: {
                            beginAtZero: true
                        },
                    },
                layout: {
                    padding: 20
                },
            }
        });
    </script>
@endpush
