<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        return view('mahasiswa.profil.index', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'tanggal_lahir' => 'required|date',
        ]);

        $mahasiswa->update($request->only(
            'nama',
            'email',
            'tanggal_lahir'
        ));

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
