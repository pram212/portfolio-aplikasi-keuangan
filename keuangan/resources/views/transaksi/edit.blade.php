@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Ubah Transaksi</div>
                <div class="card-body">
                    <form action="{{url('/transaksi/'.$transaksi->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <label for="tanggal">Tanggal :
                              <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal')
                                  is-invalid
                              @enderror" value="{{old('tanggal', $transaksi->tanggal)}}">
                          </label>
                          @error('tanggal')
                            <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori :</label>
                            <select class="custom-select" name="kategori" id="kategori">
                                @foreach ($kategori as $data)
                                <option value="{{$data->id}}" {{old('kategori', $transaksi->kategori->id) == $data->id ? 'selected' : ''}}>{{ $data->kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis :</label>
                            <select class="custom-select" name="jenis" id="jenis">
                                <option value="pemasukan" {{old('jenis', $transaksi->jenis) == 'pemasukan' ? 'selected' : ''}}>pemasukan</option>
                                <option value="pengeluaran" {{old('jenis', $transaksi->jenis) == 'pengeluaran' ? 'selected' : ''}}>pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="nominal">Nominal :</label>
                          <input type="number" name="nominal" id="nominal" class="form-control" placeholder="masukan nominal..." value="{{old('nominal', $transaksi->nominal)}}">
                          @error('nominal')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan :</label>
                          <textarea class="form-control" name="keterangan" id="keterangan" rows="2" placeholder="masukan keterangan...">
{{old('keterangan', $transaksi->keterangan)}}
                          </textarea>
                          @error('keterangan')
                              <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-secondary btn-sm" href="/transaksi" role="button">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection