@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Edit Kategori</div>
                <div class="card-body">
                    <form action="{{url('/transaksi/'.$transaksi->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="tanggal">Tanggal :</label>
                          <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal')
                              is-invalid
                          @enderror" placeholder="Masukan nama tanggal" aria-describedby="helpId" value="{{$kategori->tanggal}}">
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