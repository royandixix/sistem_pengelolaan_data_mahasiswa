<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Akun ini belum terhubung dengan data mahasiswa');
        }

        // Ambil semua mata kuliah mahasiswa
        $mataKuliahs = $mahasiswa->mataKuliahs ?? collect();

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($mataKuliahs as $mk) {
            $sks = $mk->sks ?? 0;
            $nilaiHuruf = strtoupper(trim($mk->pivot->nilai ?? '-'));

            // Mapping nilai huruf ke bobot
            $bobot = match ($nilaiHuruf) {
                'A'   => 4.0,
                'A-'  => 3.7,
                'B+'  => 3.3,
                'B'   => 3.0,
                'B-'  => 2.7,
                'C+'  => 2.3,
                'C'   => 2.0,
                'C-'  => 1.7,
                'D+'  => 1.3,
                'D'   => 1.0,
                'D-'  => 0.7,
                'E', 'F', '-' => 0.0,
                default => 0.0,
            };

            $totalSks += $sks;
            $totalBobot += $sks * $bobot;

            // Inject ke object untuk Blade
            $mk->nilai_huruf = $nilaiHuruf;
            $mk->bobot = $bobot;
        }

        $ipk = $totalSks > 0 ? $totalBobot / $totalSks : 0;

        // Statistik ringkasan
        $totalMataKuliah = $mataKuliahs->count();

        return view('mahasiswa.index', compact(
            'mahasiswa',
            'mataKuliahs',
            'totalMataKuliah',
            'totalSks',
            'totalBobot',
            'ipk'
        ));
    }
}
