@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">Daftar Transaksi</div>
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a name="" id="" class="btn btn-primary border btn-sm" href="/transaksi/create" role="button">baru</a>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown open">
                                <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Export          
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <button class="dropdown-item" href="#">PDF</button>
                                    <button class="dropdown-item" href="#">Excel</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-sm btn-warning" href="#" role="button">Import</a>
                        </li>
                        <li class="list-inline-item">
                            <form class="form-inline">
                                <input class="form-control-sm mr-sm-2" type="search" placeholder="Ketikan nama transaksi" aria-label="Search" autofocus>
                                <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Cari</button>
                              </form>
                        </li>
                    </ul>
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
                    <table class="table table-sm table-bordered table-responsive">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th width="1%" rowspan="2" class="align-middle">No</th>
                                <th rowspan="2" class="align-middle">Tanggal</th>
                                <th rowspan="2" class="align-middle">Jenis Transaksi</th>
                                <th rowspan="2" class="align-middle">Keterangan</th>
                                <th rowspan="2" class="align-middle">Kategori</th>
                                <th colspan="2" class="align-middle">Transaksi</th>
                                <th width="10%" rowspan="2" class="align-middle">Opsi</th>
                            </tr>
                            <tr>
                                <th width="12%">Pemasukan</th>
                                <th width="12%">Pengeluaran</th>
                            </tr>
                         </thead>
                         <tbody>
                             @forelse ($transaksi as $item)
                             <tr>
                                 <td scope="row">{{$loop->iteration}}</td>
                                 <td>{{date('d-m-y', strtotime($item->tanggal))}}</td>
                                 <td>{{ucwords($item->jenis)}}</td>
                                 <td>{{ucwords($item->keterangan)}}</td>
                                 <td>{{ucwords($item->kategori->kategori)}}</td>
                                 <td class="text-center">
                                     @if ($item->jenis == 'pemasukan')
                                         {{"Rp".number_format($item->nominal).",00"}}
                                     @else
                                     
                                     @endif
                                 </td>
                                 <td class="text-center">
                                     @if ($item->jenis == 'pengeluaran')
                                     {{"Rp".number_format($item->nominal).",00"}}
                                     @else
                                     
                                     @endif
                                 </td>
                                 <td class="text-center">
                                     <ul class="list-inline mb-0">
                                         <li class="list-inline-item">
                                             <a class="btn btn-sm btn-info" href="{{url('/transaksi/'.$item->id.'/edit')}}" role="button">edit</a>
                                         </li>
                                         <li class="list-inline-item">
                                             <form action="{{url('transaksi/'.$item->id)}}" method="POST">
                                                 @csrf
                                                 @method('delete')
                                                 <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                             </form>
                                         </li>
                                     </ul>
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
                    <ul class="list-inline float-left">
                        <li class="list-inline-item">
                            Halaman : {{$transaksi->currentPage()}} 
                        </li>
                        <li class="list-inline-item">
                            Jumlah Data : {{$transaksi->total()}} 
                        </li>
                        <li class="list-inline-item">
                            Data Perhalaman : {{$transaksi->perPage()}} 
                        </li>
                    </ul>
                    {{$transaksi->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
