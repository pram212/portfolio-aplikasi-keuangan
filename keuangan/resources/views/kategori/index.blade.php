@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Daftar Kategori
                    @if (Session::has('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>{{Session::get('sukses')}}</strong> 
                        </div>
                        <script>
                          $(".alert").alert();
                        </script>
                    @endif
                </div>
                <div class="card-body">
                    <ul class="list-inline float-left">
                        <li class="list-inline-item">
                            Halaman : {{$kategori->currentPage()}} 
                        </li>
                        <li class="list-inline-item">
                            Jumlah Data : {{$kategori->total()}} 
                        </li>
                        <li class="list-inline-item">
                            Data Perhalaman : {{$kategori->perPage()}} 
                        </li>
                    </ul>
                    <a name="" id="" class="btn btn-primary btn-sm my-2 float-right" href="/kategori/tambah" role="button">Baru</a>
                   <table class="table table-sm table-bordered table-responsive">
                       <thead class="text-center bg-dark text-white">
                           <tr>
                               <th width="1%">No</th>
                               <th>Nama Kategori</th>
                               <th width="25%">Opsi</th>
                           </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $item)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$item->kategori}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="{{url('/kategori/edit/'.$item->id)}}" role="button">edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{url('/kategori/hapus/'.$item->id)}}" role="button">hapus</a>
                                </td>
                            </tr>  
                            @empty
                            <tr class="text-center">
                                <td colspan="3">
                                    Belum ada data.
                                </td>
                            </tr>
                            @endforelse                        
                        </tbody>
                   </table>
                </div>
                <div class="card-footer">
                    {{$kategori->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
