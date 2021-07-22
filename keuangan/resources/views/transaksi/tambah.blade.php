@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Transaksi Baru</div>
                <div class="card-body">
                    <form action="{{url('/transaksi')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="tanggal">Nama Transaksi :</label>
                          <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal')
                              is-invalid
                          @enderror" placeholder="Masukan nama kategori" aria-describedby="helpId" value="{{old('tanggal')}}">
                          @error('tanggal')
                            <small id="helpId" class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-secondary btn-sm" href="/kategori" role="button">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection