<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Tampilkan daftar Mata Kuliah
    public function index(Request $request)
    {
        $query = MataKuliah::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('kode', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%")
                  ->orWhere('dosen', 'like', "%{$search}%");
        }

        $mataKuliahs = $query->get();
        return view('admin.mata_kuliah.index', compact('mataKuliahs'));
    }

    // Form tambah Mata Kuliah
    public function create()
    {
        return view('admin.mata_kuliah.create');
    }

    // Simpan Mata Kuliah baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode',
            'nama' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        MataKuliah::create($request->only('kode','nama','dosen','sks','status'));

        return redirect()->route('admin.mata-kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    // Form edit Mata Kuliah
    public function edit(MataKuliah $mataKuliah)
    {
        return view('admin.mata_kuliah.edit', compact('mataKuliah'));
    }

    // Update Mata Kuliah
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode,'.$mataKuliah->id,
            'nama' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'sks' => 'required|integer|min:1',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        $mataKuliah->update($request->only('kode','nama','dosen','sks','status'));

        return redirect()->route('admin.mata-kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diupdate.');
    }

    // Hapus Mata Kuliah
    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()->route('admin.mata-kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
