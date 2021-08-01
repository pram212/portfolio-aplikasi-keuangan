<?php

namespace App\Http\Controllers;
use App\Kategori;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ambil data transaksi
    $transaksi = Transaksi::orderBy('id', 'desc')->paginate(7);
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tampilkan view tambah dan kirim data dari model Kategori
        $kategori = Kategori::all();
        return view('transaksi.tambah', compact('kategori'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        // validasi data
        $request->validate([
            'tanggal' => 'required',
            'kategori' => 'required',
            'jenis' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);
        
        // insert ke dalam tabel transaksis
        Transaksi::insert([
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect('/transaksi')->with('sukses', 'Transaksi berhasil disimpan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
        $kategori = Kategori::all();
        return view('transaksi.edit', compact('transaksi', 'kategori'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {   
        // dd($transaksi);
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required',
            'jenis' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        $transaksi->tanggal = $request->tanggal;
        $transaksi->kategori_id = $request->kategori;
        $transaksi->jenis = $request->jenis;
        $transaksi->nominal = $request->nominal;
        $transaksi->keterangan = $request->keterangan;

        $transaksi->save();

        return redirect('/transaksi')->with('sukses', 'Transaksi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        // hapus transaksi yang bersangkutan
        $transaksi->delete();
        // balik ke halaman sebelumnya dengan membawa session flash.
        return redirect()->back()->with('sukses', 'Transaksi berhasil dihapus.');
    }

    public function pencarian(Request $request)
    {   
        $katakunci = $request->katakunci;
        $transaksi = Transaksi::where('jenis', 'like', '%'.$katakunci.'%')
                            ->orWhere('tanggal', 'like', '%'.$katakunci. '%')
                            ->orWhere('keterangan', 'like', '%'.$katakunci. '%')
                            ->orWhere('nominal', '=', '%'.$katakunci. '%')
                            ->paginate(7);

        // menambahkan kewword pencarian ke data transaksi
        $transaksi->appends($request->only('katakunci'));
        // passing data ke view index transaksi.
        return view('transaksi.index', compact('transaksi'));
    }
}
