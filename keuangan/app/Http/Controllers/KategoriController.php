<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Transaksi;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        // ambil data dari tabel kategoris
        $kategori = Kategori::paginate(7);

        // tampilkan hal. index kategori yg berada dalam folder: resources/views/kategori/index.blade.php
        // kirim data ke dalam view ($kategori)
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tampilkan form tambah kategori yg berada dalam folder: resources/views/kategori/tambah.blade.php
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi hasil inputan
        $request->validate([
            'kategori' => 'required'
        ]);
        
        // simpan ke dalam database
        Kategori::create($request->all()); 
            # untuk menggunakan request->all(), nama inputan harus sama dengan nama atribut dalam tabel yang bersangkutan
        
        // arahkan kembali ke /kategori dengan menyertakan session flash bernama 'sukses' dan 'pesan'.
        return redirect('/kategori')->with('sukses', 'Kategori baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        // validasi request
        $request->validate([
            'kategori' => 'required'
        ]);

        // update tabel kategori dengan id tertentu ($kategori) 
        $kategori->update($request->all());

        // alihkan ke /kategori disertai flash 'sukses' dengan pesan 'data berhasil diubah!'.
        return redirect('/kategori')->with('sukses', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        // hapus kategori
        $coba = $kategori->transaksi();
        // hapus juga data transaksi yang termasuk ke dalam kategori tersebut
        $coba->delete();
        $kategori->delete();
        
        
        // alihkan ke /kategori disertai flash 'sukses' dengan pesan 'data berhasil dihapus!'.
        return redirect('/kategori')->with('sukses', 'Data kategori serta transaksi terkait berhasil dihapus!');
    }
}
