<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        // Ambil mahasiswa yang login
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('logout'); // aman kalau user_id kosong
        }

        // Ambil semua mata kuliah mahasiswa beserta pivot nilai
        $mataKuliahs = $mahasiswa->mataKuliahs ?? collect();

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($mataKuliahs as $mk) {
            $sks = $mk->sks ?? 0;
            $nilaiHuruf = $mk->pivot->nilai ?? '-';

            // Konversi nilai huruf ke angka
            $bobotAngka = match ($nilaiHuruf) {
                'A' => 4,
                'A-' => 3.7,
                'B+' => 3.3,
                'B' => 3,
                'B-' => 2.7,
                'C+' => 2.3,
                'C' => 2,
                'C-' => 1.7,
                'D' => 1,
                'E', 'F' => 0,
                default => 0,
            };

            // Total bobot per mata kuliah = SKS × angka
            $mk->nilai_huruf = $nilaiHuruf;
            $mk->bobot = $bobotAngka * $sks;

            $totalSks += $sks;
            $totalBobot += $mk->bobot;
        }

        // Hitung IPK
        $ipk = $totalSks > 0 ? $totalBobot / $totalSks : 0;

        return view('mahasiswa.nilai.index', compact(
            'mahasiswa',
            'mataKuliahs',
            'totalSks',
            'totalBobot',
            'ipk'
        ));
    }
}
