@extends('mahasiswa.layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-green-500 to-teal-600 text-white p-6 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold">Halo, {{ $mahasiswa->nama }} 👋</h1>
        <p class="mt-1 text-green-100">Selamat datang di dashboard akademik kamu!</p>
    </div>

    {{-- Statistik Ringkasan --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <p class="text-gray-500 font-semibold">Total Mata Kuliah</p>
            <h3 class="text-2xl font-bold">{{ $totalMataKuliah }}</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <p class="text-gray-500 font-semibold">Total SKS</p>
            <h3 class="text-2xl font-bold">{{ $totalSks }}</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <p class="text-gray-500 font-semibold">Total Bobot</p>
            <h3 class="text-2xl font-bold">{{ number_format($totalBobot, 2) }}</h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 text-center">
            <p class="text-gray-500 font-semibold">IPK</p>
            <h3 class="text-2xl font-bold text-green-600">{{ number_format($ipk, 2) }}</h3>
        </div>
    </div>

    {{-- Tabel Nilai Mata Kuliah --}}
    <div class="bg-white rounded-2xl shadow overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">SKS</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Nilai</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Bobot</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($mataKuliahs as $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $mk->nama }}</td>
                        <td class="px-4 py-3 text-center">{{ $mk->sks }}</td>
                        <td class="px-4 py-3 text-center font-semibold">{{ $mk->nilai_huruf }}</td>
                        <td class="px-4 py-3 text-center">{{ number_format($mk->bobot, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                            Data nilai belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
