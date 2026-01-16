<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    // ===============================
    // LIST MAHASISWA
    // ===============================
    public function index(Request $request)
    {
        $query = Mahasiswa::with('jurusan');

        if ($request->search) {
            $query->where('nama', 'like', "%{$request->search}%")
                ->orWhere('nim', 'like', "%{$request->search}%")
                ->orWhereHas('jurusan', function ($q) use ($request) {
                    $q->where('nama', 'like', "%{$request->search}%");
                });
        }

        $mahasiswas = $query->orderBy('nama')->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    // ===============================
    // FORM TAMBAH
    // ===============================
    public function create()
    {
        $jurusans = Jurusan::where('status', 'aktif')->orderBy('nama')->get();
        return view('admin.mahasiswa.create', compact('jurusans'));
    }

    // ===============================
    // SIMPAN MAHASISWA (🔥 FIX UTAMA 🔥)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email|unique:users,email',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        // 🔥 1. BUAT USER MAHASISWA
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make(str()->random(32)), // password random
            'role' => 'mahasiswa',
        ]);

        // 🔥 2. BUAT DATA MAHASISWA & HUBUNGKAN KE USER
        Mahasiswa::create([
            'user_id' => $user->id, // ⬅️ INI KUNCI
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan_id' => $request->jurusan_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan & akun otomatis dibuat');
    }

    // ===============================
    // FORM EDIT
    // ===============================
    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusans = Jurusan::where('status', 'aktif')->orderBy('nama')->get();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    // ===============================
    // UPDATE MAHASISWA
    // ===============================
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'jurusan_id' => 'required|exists:jurusans,id',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $mahasiswa->update($request->all());

        // 🔁 Sinkron email user
        if ($mahasiswa->user) {
            $mahasiswa->user->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);
        }

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diperbarui');
    }

    // ===============================
    // HAPUS MAHASISWA
    // ===============================
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user) {
            $mahasiswa->user->delete(); // auto hapus user juga
        }

        $mahasiswa->delete();

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }
}
