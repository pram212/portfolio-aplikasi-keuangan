@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Laporan Transaksi</div>
                <div class="card-body">
                    <form action="{{url('/laporan/filter')}}" method="GET">
                        @csrf
                        <div class="row justify-content-center border">
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                  <label for="from">Dari tanggal :</label>
                                  <input type="date" name="from" id="from" class="form-control @error('from') is-invalid @enderror">
                                  @error('from')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="to">Sampai tanggal :</label>
                                    <input type="date" name="to" id="to" class="form-control @error('to') is-invalid @enderror">
                                    @error('to')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="kategori">Kategori :</label>
                                    <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                        <option value="semua">Semua</option>
                                        @foreach ($kategori as $data)
                                        <option value="{{$data->id}}">{{$data->kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#laporan").addClass('active');
    </script>
@endpush