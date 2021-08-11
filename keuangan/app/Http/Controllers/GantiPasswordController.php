<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GantiPasswordController extends Controller
{
    //
    public function form()
    {
        return view('ganti-password');
    }

    public function reset(Request $request)
    {
        // cek validasi password lama
        if (!(Hash::check($request->get('current-password'), Auth::user()->password) ) ) 
        {
            return redirect()->back()->with('error', 'Password lama anda salah!');

        } 
        
        // cek jika password baru sama dengan password lama
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0)
        {
            return redirect()->back()->with('error', 'Password baru sama dengan password lama!');
        }

        // validasi form
        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        // ganti passsword user
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('sukses', 'Kata sandi anda berhasil diubah');
        
    }


}
