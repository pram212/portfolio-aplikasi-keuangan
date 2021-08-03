@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-secondary">
                <div class="card-header text-center bg-dark text-white">Daftar Transaksi</div>
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a name="" id="" class="btn btn-primary border btn-sm" href="/transaksi/create" role="button">Transaksi Baru</a>
                        </li>
                        <li class="list-inline-item">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-success btn-sm">Import</button>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">pdf</a>
                                        <a class="dropdown-item" href="#">excel</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <form class="form-inline" action="{{url('/transaksi/pencarian')}}" method="get">
                                <input class="form-control-sm mr-sm-2" type="search" placeholder="cari transaksi..." aria-label="Search" autofocus style="border: 0px" name="katakunci" value="@isset($katakunci)
                                    {{$katakunci}}
                                @endisset">
                                <button class="btn btn-outline-light btn-sm my-2 my-sm-0" type="submit">Cari</button>
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
                    <table class="table table-sm table-dark table-bordered table-striped table-responsive">
                        <thead class="text-center">
                            <tr>
                                <th width="1%" rowspan="2" class="align-middle">No</th>
                                <th rowspan="2" class="align-middle">Tanggal</th>
                                <th rowspan="2" class="align-middle">Jenis Transaksi</th>
                                <th rowspan="2" class="align-middle">Keterangan</th>
                                <th rowspan="2" class="align-middle">Kategori</th>
                                <th colspan="2" class="align-middle">Transaksi</th>
                                <th width="12%" rowspan="2" class="align-middle">Opsi</th>
                            </tr>
                            <tr>
                                <th width="12%">Pemasukan</th>
                                <th width="12%">Pengeluaran</th>
                            </tr>
                         </thead>
                         <tbody>
                             @forelse ($transaksi as $item)
                             <tr>
                                 <td scope="row" class="text-center">{{$loop->iteration}}</td>
                                 <td>{{date('d/m/y', strtotime($item->tanggal))}}</td>
                                 <td>{{ucwords($item->jenis)}}</td>
                                 <td>{{ucwords($item->keterangan)}}</td>
                                 <td>{{ucwords($item->kategori->kategori)}}</td>
                                 <td class="text-center">
                                     @if ($item->jenis == 'pemasukan')
                                         {{"Rp ".number_format($item->nominal).",00"}}
                                     @else
                                     
                                     @endif
                                 </td>
                                 <td class="text-center">
                                     @if ($item->jenis == 'pengeluaran')
                                     {{"Rp ".number_format($item->nominal).",00"}}
                                     @else
                                     
                                     @endif
                                 </td>
                                 <td class="text-center">
                                     <ul class="list-inline mb-0">
                                         <li class="list-inline-item">
                                             <a class="btn btn-sm btn-info" href="{{url('/transaksi/'.$item->id.'/edit')}}" role="button">edit</a>
                                         </li>
                                         <li class="list-inline-item">
                                             <!-- Button trigger modal -->
                                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId{{$item->id}}">
                                               hapus
                                             </button>
                                             {{-- modal delete start --}}
                                             <div class="modal fade text-dark" id="modelId{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                 <div class="modal-dialog" role="document">
                                                     {{-- modal content delete --}}
                                                     <div class="modal-content">
                                                         {{-- modal header --}}
                                                         <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                         </div>
                                                         {{-- modal header end --}}
                                                         {{-- modal body start --}}
                                                         <div class="modal-body">
                                                             Apa kamu yakin mau hapus transaksi ini?
                                                         </div>
                                                         {{-- modal body end --}}
                                                         {{-- modal footer --}}
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Batal</button>
                                                             {{-- form delete --}}
                                                             <form action="{{url('transaksi/'.$item->id)}}" method="POST">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                             </form>
                                                             {{-- form delete end --}}
                                                         </div>
                                                         {{-- modal content end --}}
                                                     </div>
                                                     {{-- modal content delete --}}
                                                 </div>
                                             </div>
                                             {{-- modal delete end --}}
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
                <div class="card-footer pl-4 pb-0 bg-dark text-white">
                    <ul class="list-inline p-0">
                        <li class="list-inline-item border px-2">
                            Halaman : {{$transaksi->currentPage()}}
                        </li>
                        <li class="list-inline-item border px-2">
                            Total data : {{$transaksi->total()}} 
                        </li>
                    </ul>
                    {{$transaksi->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
