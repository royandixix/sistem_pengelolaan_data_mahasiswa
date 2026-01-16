<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalJurusan = Jurusan::count();

        $mahasiswaStatus = [
            'aktif' => Mahasiswa::where('status', 'aktif')->count(),
            'cuti' => Mahasiswa::where('status', 'cuti')->count(),
            'nonaktif' => Mahasiswa::where('status', 'nonaktif')->count(),
        ];

        $mahasiswa = Mahasiswa::latest()->paginate(10);

        return view('admin.index', compact(
            'totalMahasiswa',
            'totalJurusan',
            'mahasiswaStatus',
            'mahasiswa'
        ));
    }
}
