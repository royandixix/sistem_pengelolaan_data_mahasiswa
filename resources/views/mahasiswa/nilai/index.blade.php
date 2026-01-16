@extends('mahasiswa.layouts.app')

@section('title', 'Nilai Akademik')

@section('content')
<div class="space-y-4 sm:space-y-6 px-2 sm:px-4 pb-6">

    {{-- Header Section: Emerald Style --}}
    <div class="bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-800 rounded-xl shadow-lg overflow-hidden">
        <div class="px-5 py-6 sm:px-8 sm:py-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="text-left">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Nilai Akademik</h1>
                    <p class="mt-2 text-emerald-100 opacity-90 text-sm sm:text-base">Daftar nilai mata kuliah yang telah Anda tempuh.</p>
                </div>
                <div class="flex md:justify-end">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-4 border border-white/20 w-full sm:w-auto text-center">
                        <p class="text-xs text-emerald-200 uppercase font-semibold tracking-wider">Semester Saat Ini</p>
                        <p class="text-3xl sm:text-4xl font-black text-white mt-1">{{ $mahasiswa->semester ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Overview: SKS, Bobot, IPK --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-6">
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-100 shadow-sm transition-all">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-blue-50 rounded-lg text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalSks }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-tight">Total SKS</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-100 shadow-sm transition-all">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-purple-50 rounded-lg text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($totalBobot, 2) }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-tight">Total Bobot</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-emerald-100 shadow-md shadow-emerald-50 transition-all">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-emerald-50 rounded-lg text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-emerald-600">{{ number_format($ipk, 2) }}</p>
                    <p class="text-xs font-medium text-emerald-600 uppercase tracking-tight">IPK Transkrip</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Nilai: Clean Modern Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 tracking-tight">Rincian Nilai Perkuliahan</h2>
            <button class="text-xs bg-gray-50 hover:bg-gray-100 text-gray-600 px-3 py-1.5 rounded-lg border border-gray-200 transition">
                Filter Semester
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest w-16">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Mata Kuliah</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">SKS</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Nilai</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Bobot</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($mataKuliahs as $item)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4 text-sm font-medium text-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors">{{ $item->nama ?? '-' }}</p>
                            <p class="text-[10px] text-gray-400 mt-0.5 uppercase tracking-tighter">Wajib Kurikulum</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-block px-2.5 py-1 bg-gray-100 text-gray-600 rounded-md text-xs font-bold">
                                {{ $item->sks ?? 0 }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @php
                                $grade = $item->nilai_huruf ?? '-';
                                $gradeColors = [
                                    'A' => 'bg-emerald-100 text-emerald-700',
                                    'B' => 'bg-blue-100 text-blue-700',
                                    'C' => 'bg-amber-100 text-amber-700',
                                    'D' => 'bg-orange-100 text-orange-700',
                                    'E' => 'bg-red-100 text-red-700',
                                ]
                            @endphp
                            <span class="inline-block px-3 py-1.5 {{ $gradeColors[substr($grade, 0, 1)] ?? 'bg-gray-100 text-gray-700' }} rounded-lg text-xs font-black">
                                {{ $grade }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-600">{{ number_format($item->bobot ?? 0, 2) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="text-gray-400 text-sm font-medium">Belum ada data nilai untuk ditampilkan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Info Card: Tip --}}
    <div class="bg-blue-50 rounded-xl p-4 border border-blue-100 flex items-start space-x-3">
        <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <p class="text-xs text-blue-700 leading-relaxed">
            <strong>Info:</strong> Nilai yang tercantum di atas adalah nilai final yang sudah divalidasi. Jika terdapat ketidaksesuaian data, silakan hubungi bagian Akademik atau Dosen Wali Anda.
        </p>
    </div>

</div>
@endsection