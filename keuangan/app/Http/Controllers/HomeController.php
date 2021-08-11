<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

use App\Kategori;
use App\Transaksi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        $month = Carbon::now()->format('m');
        $bulan_ini = Carbon::now()->isoFormat('MMMM Y');
        
        $jml_pemasukan = Transaksi::where('jenis','pemasukan')->whereMonth('tanggal', '=' ,$month)->pluck('nominal');
        $jml_pengeluaran = Transaksi::where('jenis','pengeluaran')->whereMonth('tanggal', '=' ,$month)->pluck('nominal');
        
        $transaksi = Transaksi::where('jenis','pengeluaran')->whereMonth('tanggal', '=' ,$month)->get();
        
        # get data kategori 
        $pengeluaran = Transaksi::where('jenis','pengeluaran')->whereMonth('tanggal', '=' ,$month)->pluck('kategori_id');
        
        $pengeluaran_grouping = $pengeluaran->groupBy('kategori_id');
        // dump($pengeluaran_grouping);
        $flattened = $pengeluaran_grouping->flatten();

        $filtered = $flattened->unique();
    
        $arr_kategori = [];
        
        foreach ($filtered as $key => $value) {
            array_push($arr_kategori, Kategori::where('id', $value)->pluck('kategori'));
        }
        # result
        $kategori = Arr::collapse($arr_kategori);
        $nama_kategori = "";

        foreach ($kategori as $key => $value) {
            $nama_kategori .= "'" . $value . "', ";
        }

        $nominal_grouping = Transaksi::where('jenis', 'pengeluaran')->whereMonth('tanggal', '=', $month)->get();
        $collection = $nominal_grouping->groupBy('kategori_id');

        $jmlh_perbiaya = "";
        foreach ($collection as $key => $value) {
            $jmlh_perbiaya .= "'" . $value->sum('nominal') . "',";
        }
        // dump($jmlh_perbiaya);
        
        $totaltransaksi = Transaksi::whereMonth('tanggal', '=', $month)->get();
        // dd($totaltransaksi->sum('nominal'));

        // ambil total nominal dalam setiap transaksi yang sudah digrup berdasarkan id kategori.
       
        return view('home', compact('jml_pemasukan', 'jml_pengeluaran', 'bulan_ini', 'nama_kategori', 'jmlh_perbiaya', 'totaltransaksi'));
    }
    
}
