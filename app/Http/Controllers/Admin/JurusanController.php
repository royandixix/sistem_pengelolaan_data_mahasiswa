<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Daftar jurusan
    public function index()
    {
        $jurusans = Jurusan::orderBy('nama')->paginate(10);
        return view('admin.jurusan.index', compact('jurusans'));
    }

    // Form tambah jurusan
    public function create()
    {
        return view('admin.jurusan.create');
    }

    // Simpan jurusan baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:jurusans,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        Jurusan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.jurusan.index')
                         ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    // Form edit jurusan
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    // Update jurusan
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:jurusans,kode,' . $jurusan->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,tidak aktif'
        ]);

        $jurusan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.jurusan.index')
                         ->with('success', 'Jurusan berhasil diupdate.');
    }

    // Hapus jurusan
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')
                         ->with('success', 'Jurusan berhasil dihapus.');
    }
}
