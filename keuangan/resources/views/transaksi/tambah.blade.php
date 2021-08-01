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
                        <div class="row">
                            <div class="form-group col-3">
                              <label for="tanggal">Tanggal : <span class="text-danger">*</span></label>
                                  <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal')
                                      is-invalid
                                  @enderror" value="{{old('tanggal')}}" autofocus>
                              @error('tanggal')
                                <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="kategori">Kategori : <span class="text-danger">*</span></label>
                                <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                    <option></option>
                                    @foreach ($kategori as $data)
                                    <option value="{{$data->id}}" {{old('kategori') == $data->id ? 'selected' : ''}}>{{ $data->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="jenis">Jenis : <span class="text-danger">*</span></label>
                                <select class="custom-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                    <option></option>
                                    <option value="pemasukan" {{old('jenis') == 'pemasukan' ? 'selected' : ''}}>pemasukan</option>
                                    <option value="pengeluaran" {{old('jenis') == 'pengeluaran' ? 'selected' : ''}}>pengeluaran</option>
                                </select>
                                @error('jenis')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="nominal">Nominal : <span class="text-danger">*</span></label>
                                <input type="number" name="nominal" id="nominal" class="form-control @error('nominal') is-invalid @enderror" placeholder="masukan nominal..." value="{{old('nominal')}}">
                                @error('nominal')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="keterangan">Keterangan : <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="2">
{{old('keterangan')}}
                                </textarea>
                                @error('keterangan')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row  justify-content-center">
                            <button type="submit" class="btn m-2 btn-success btn-sm">Simpan</button>
                            <a class="btn btn-light btn-sm m-2" href="/transaksi" role="button">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection