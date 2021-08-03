@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Ganti Password</div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>{{session('error')}}</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                    @endif

                    @if (session('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>{{session('sukses')}}</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                    @endif

                    <form action="{{url('/gantipassword')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="kategori">Password lama :</label>
                          <input type="password" name="current-password" id="current-password" class="form-control @error('current-password')
                              is-invalid
                          @enderror" placeholder="Masukan password lama" aria-describedby="helpId" value="{{old('current-password')}}" autofocus autocomplete="off">
                          @error('current-password')
                            <small id="helpId" class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="kategori">Password baru :</label>
                          <input type="password" name="new-password" id="new-password" class="form-control @error('new-password')
                              is-invalid
                          @enderror" placeholder="Masukan password baru" aria-describedby="helpIdnew" value="{{old('new-password')}}" autocomplete="off">
                          @error('new-password')
                            <small id="helpIdnew" class="text-danger">{{$message}}</small>
                          @enderror
                          <small id="helpIdnew" class="text-muted">Password baru tidak boleh sama dengan password lama.</small>
                        </div>
                        <div class="form-group">
                          <label for="password-coonfirm">Konfirmasi password :</label>
                          <input type="password" name="new-password_confirmation" id="new-password_confirmation" class="form-control @error('new-password_confirmation')
                              is-invalid
                          @enderror" placeholder="Konfirmasi password baru" aria-describedby="helpId" value="{{old('new-password_confirmation')}}" autocomplete="off">
                          @error('new-password_confirmation')
                            <small id="helpId" class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                        <a class="btn btn-secondary btn-sm" href="/home" role="button">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection