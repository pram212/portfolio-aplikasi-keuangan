@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Laporan Transaksi</div>
                {{-- card body start --}}
                <div class="card-body">
                    {{-- form start --}}
                    <form action="{{url('/laporan/filter')}}" method="GET">
                        @csrf
                        {{-- row start --}}
                        <div class="row justify-content-center border">
                            {{-- col-md-3 start --}}
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                  <label for="from">Dari tanggal :</label>
                                  <input type="date" name="from" id="from" class="form-control @error('from') is-invalid @enderror" value="{{$from}}">
                                  @error('from')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            {{-- col-md-3 end --}}
                            {{-- col-md-3 start --}}
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="to">Sampai tanggal :</label>
                                    <input type="date" name="to" id="to" class="form-control @error('to') is-invalid @enderror" value="{{$to}}">
                                    @error('to')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- col-md-3 end --}}
                            {{-- col-md-4 start --}}
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="kategori">Kategori :</label>
                                    <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                        <option value="semua">Semua</option>
                                        @foreach ($kategori as $data)
                                        <option value="{{$data->id}}" @if ($data->id == $id_kategori)
                                            selected
                                        @endif>{{$data->kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- col-md-4 end --}}
                            {{-- col-md-2 start --}}
                            <div class="col-md-2 border-left">
                                <ul class="list-inline mt-4 d-flex justify-content-center">
                                    <li class="list-inline-item">
                                        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-secondary btn-sm" href="/laporan" role="button">Reset</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- col-md-2 end --}}
                        </div>
                        {{-- row end --}}
                    </form>
                    {{-- form end --}}
                    {{-- list-inline start --}}
                    <ul class="list-inline mt-2">
                        <li class="list-inline-item">
                            <a class="btn btn-secondary btn-sm" href="{{url('/laporan/print?from='.$from.'&to='.$to.'&kategori='.$id_kategori)}}" role="button" target="_blank">Print</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-success btn-sm" href="{{url('/laporan/excel?dari='.$from.'&sampai='.$to.'&kategori='.$id_kategori)}}" role="button" target="_blank">Excel</a>
                        </li>
                    </ul>
                    {{-- list-inline end --}}
                    <table class="table table-sm table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" class="align-middle">Tanggal</th>
                                <th rowspan="2" class="align-middle">Jenis</th>
                                <th rowspan="2" class="align-middle">Kategori</th>
                                <th rowspan="2" class="align-middle">Keterangan</th>
                                <th colspan="2" class="align-middle">Transaksi</th>
                            </tr>
                            <tr>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        @php
                            $totalpemasukan = 0;
                            $totalpengeluaran = 0;
                        @endphp
                        <tbody>
                            @foreach ($laporan as $data)
                            <tr>
                                <td scope="row">{{ date('d/m/Y', strtotime($data->tanggal)) }}</td>
                                <td>{{$data->jenis}}</td>
                                <td>{{$data->kategori->kategori}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>
                                    @if ($data->jenis == 'pemasukan')
                                        {{"Rp ".number_format($data->nominal). ",-"}}
                                    @else
                                        Rp 0
                                    @endif
                                </td>
                                <td>
                                    @if ($data->jenis == 'pengeluaran')
                                        {{"Rp ". number_format($data->nominal). ",-"}}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            @php
                                if ($data->jenis == 'pemasukan') {
                                    $totalpemasukan += $data->nominal;
                                } else if($data->jenis == 'pengeluaran') {
                                    $totalpengeluaran += $data->nominal;
                                }
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Total :</td>
                                <td><strong>{{"Rp ". number_format($totalpemasukan). ",-"}}</strong></td>
                                <td><strong>{{"Rp ". number_format($totalpengeluaran). ",-"}}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- card-body end --}}
            </div>
            {{-- card end --}}
        </div>
        {{-- col-md-8 end --}}
    </div>
    {{-- row end --}}
</div>
{{-- container-fluid end --}}
@endsection
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#laporan").addClass('active');
    </script>
@endpush