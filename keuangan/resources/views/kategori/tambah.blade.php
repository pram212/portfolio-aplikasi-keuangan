@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Kategori Baru</div>
                <div class="card-body">
                    <form action="{{url('/kategori/simpan')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="kategori">Nama Kategori :</label>
                          <input type="text" name="kategori" id="kategori" class="form-control @error('kategori')
                              is-invalid
                          @enderror" placeholder="Masukan nama kategori" aria-describedby="helpId" value="{{old('kategori')}}">
                          @error('kategori')
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