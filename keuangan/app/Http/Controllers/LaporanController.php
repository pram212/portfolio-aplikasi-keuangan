<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;

class LaporanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kategori = Kategori::all();
        // passing data kategori adalah untuk membuat filter laporan berdasarkan kategori yang dipilih.
        return view('laporan', compact('kategori'));
    }

    public function filter(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'kategori' => 'required',
        ]);

    # data kategori
        $kategori = Kategori::all();

    # data filter
        $from = $request->from;
        $to = $request->to;
        $id_kategori = $request->kategori;

    # cek kategori yang dipilih
        # jika kategori yang dipilih adalah semua
        if ($id_kategori == "semua") {
            $laporan = Transaksi::whereDate('tanggal', '>=' , $from)
                                ->whereDate('tanggal', '<=' , $to)
                                ->orderBy('id', 'desc')->get();
        # jika yang dipilih tidak semua
        } else {
            # tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::where('kategori_id', $id_kategori)
                                ->whereDate('tanggal', '>=', $from)
                                ->whereDate('tanggal', '<=', $to)
                                ->orderBy('id', 'desc')
                                ->get();
        }

        // dd($laporan);
        #passing data ke laporan
        return view('hasil-filter-laporan', compact('laporan', 'kategori', 'from', 'to', 'id_kategori'));
    }
}
