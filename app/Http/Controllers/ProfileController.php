<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    {
        // Di sini nantinya Anda bisa menambahkan logika validasi & penyimpanan ke database.
        return redirect()->route('dashboard')->with('success', 'Profil dan Password berhasil diperbarui!');
    }
}
