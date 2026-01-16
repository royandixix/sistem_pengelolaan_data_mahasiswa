<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\MahasiswaMataKuliah;
use Illuminate\Http\Request;

class MahasiswaMataKuliahController extends Controller
{
 public function index(Request $request)
{
    $query = MahasiswaMataKuliah::with('mahasiswa', 'mataKuliah');

    // Pencarian opsional
    if ($request->has('search')) {
        $search = $request->search;
        $query->whereHas('mahasiswa', function($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        })
        ->orWhereHas('mataKuliah', function($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        });
    }

    $mataKuliahs = $query->orderBy('id', 'desc')->paginate(10);

    return view('admin.mahasiswa_mata_kuliah.index', compact('mataKuliahs'));
}



    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $mataKuliahs = MataKuliah::all();
        return view('admin.mahasiswa_mata_kuliah.create', compact('mahasiswas','mataKuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'nilai' => 'nullable|string|max:5',
        ]);

        MahasiswaMataKuliah::create($request->only('mahasiswa_id','mata_kuliah_id','nilai'));

        return redirect()->route('admin.mahasiswa_mata_kuliah.index')->with('success','Nilai berhasil ditambahkan.');
    }

    public function edit(MahasiswaMataKuliah $mahasiswa_mata_kuliah)
    {
        $mahasiswas = Mahasiswa::all();
        $mataKuliahs = MataKuliah::all();
        return view('admin.mahasiswa_mata_kuliah.edit', compact('mahasiswa_mata_kuliah','mahasiswas','mataKuliahs'));
    }

    public function update(Request $request, MahasiswaMataKuliah $mahasiswa_mata_kuliah)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'nilai' => 'nullable|string|max:5',
        ]);

        $mahasiswa_mata_kuliah->update($request->only('mahasiswa_id','mata_kuliah_id','nilai'));

        return redirect()->route('admin.mahasiswa_mata_kuliah.index')->with('success','Nilai berhasil diupdate.');
    }

    public function destroy(MahasiswaMataKuliah $mahasiswa_mata_kuliah)
    {
        $mahasiswa_mata_kuliah->delete();
        return redirect()->route('admin.mahasiswa_mata_kuliah.index')->with('success','Nilai berhasil dihapus.');
    }
}
