<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

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
        return view('home');
    }

    public function kategori()
    {
        $kategori = Kategori::paginate(5);
        return view('kategori.index', compact('kategori'));
    }

    public function tambah()
    {
        return view('kategori.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kategori' => 'required'
        ]);
        
        Kategori::insert([
            'kategori' => $request->kategori
        ]);
        
        return redirect('/kategori')->with('sukses', 'Kategori baru berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }
    
    public function update($id, Request $data)
    {
        $data->validate([
            'kategori' => 'required'
        ]);

        $nama_kategori=$data->kategori;

        // update kategori
        $kategori = Kategori::find($id);
        $kategori->kategori = $nama_kategori;
        $kategori->save();

        return redirect('/kategori')->with('sukses', 'Data berhasil diupdate!');
    }

    public function hapus($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/kategori')->with('sukses', 'Data berhasil dihapus');
    }
}
