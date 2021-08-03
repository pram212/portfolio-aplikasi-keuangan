<?php

namespace App\Exports;

use App\Transaksi;
use App\Kategori;

use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {   
        // data kategori
        $kategori = Kategori::all();

        // data filter
        $from = $_GET['dari'];
        $to = $_GET['sampai'];
        $id_kategori = $_GET['kategori'];

        # cek kategori yang dipilih
        # jika kategori yang dipilih adalah semua
        if ($id_kategori == "semua") {
            $laporan = Transaksi::whereDate('tanggal', '>=' , $from)
                                ->whereDate('tanggal', '<=' , $to)
                                ->orderBy('tanggal', 'asc')->get();
        # jika yang dipilih tidak semua
        } else {
            # tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::where('kategori_id', $id_kategori)
                                ->whereDate('tanggal', '>=', $from)
                                ->whereDate('tanggal', '<=', $to)
                                ->orderBy('tanggal', 'asc')->get();
        }

        // dd($laporan);
        #passing data ke laporan

        return view('export-laporan-excel', compact('from', 'to', 'id_kategori', 'laporan'));
        
    }
}
