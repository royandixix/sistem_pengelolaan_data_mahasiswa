<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\MataKuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalJurusan = Jurusan::count();
        $totalMataKuliah = MataKuliah::count();

        $mahasiswaAktif = Mahasiswa::where('status', 'aktif')->count();

        $mahasiswaTerbaru = Mahasiswa::with('jurusan')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.index', compact(
            'totalMahasiswa',
            'totalJurusan',
            'totalMataKuliah',
            'mahasiswaAktif',
            'mahasiswaTerbaru'
        ));
    }
}
