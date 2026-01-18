{{-- FILE: resources/views/admin/index.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="p-4 md:p-6 bg-gray-50 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
        <p class="text-gray-600">Ringkasan sistem pengelolaan data mahasiswa</p>
    </div>

    {{-- STATISTIK CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Mahasiswa</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $totalMahasiswa }}</h2>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Total Jurusan</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $totalJurusan }}</h2>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Mata Kuliah</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $totalMataKuliah }}</h2>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-100 text-sm font-medium">Mahasiswa Aktif</p>
                    <h2 class="text-4xl font-bold mt-2">{{ $mahasiswaAktif }}</h2>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <a href="{{ route('admin.mahasiswa.index') }}" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow group">
            <div class="flex items-center gap-4">
                <div class="bg-blue-100 p-3 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Kelola Mahasiswa</h3>
                    <p class="text-sm text-gray-500">Manajemen data</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.jurusan.index') }}" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow group">
            <div class="flex items-center gap-4">
                <div class="bg-green-100 p-3 rounded-lg group-hover:bg-green-200 transition-colors">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Kelola Jurusan</h3>
                    <p class="text-sm text-gray-500">Program studi</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.mata-kuliah.index') }}" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow group">
            <div class="flex items-center gap-4">
                <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-200 transition-colors">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Mata Kuliah</h3>
                    <p class="text-sm text-gray-500">Kurikulum</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.mahasiswa_mata_kuliah.index') }}" class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500 hover:shadow-xl transition-shadow group">
            <div class="flex items-center gap-4">
                <div class="bg-orange-100 p-3 rounded-lg group-hover:bg-orange-200 transition-colors">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Input Nilai</h3>
                    <p class="text-sm text-gray-500">Penilaian</p>
                </div>
            </div>
        </a>

    </div>

    {{-- CHARTS SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

        {{-- CHART 1: Status Mahasiswa --}}
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                    Status Mahasiswa
                </h3>
                <p class="text-sm text-gray-500">Distribusi status mahasiswa aktif</p>
            </div>
            <div class="relative" style="height: 300px;">
                <canvas id="statusChart"></canvas>
            </div>
        </div>

        {{-- CHART 2: Mahasiswa per Jurusan --}}
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Mahasiswa per Jurusan
                </h3>
                <p class="text-sm text-gray-500">Total mahasiswa setiap program studi</p>
            </div>
            <div class="relative" style="height: 300px;">
                <canvas id="jurusanChart"></canvas>
            </div>
        </div>

    </div>

    {{-- CHART 3: Trend Pendaftaran --}}
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                </svg>
                Trend Pendaftaran Mahasiswa
            </h3>
            <p class="text-sm text-gray-500">Data pendaftaran mahasiswa per angkatan</p>
        </div>
        <div class="relative" style="height: 300px;">
            <canvas id="trendChart"></canvas>
        </div>
    </div>

    {{-- STATISTIK DETAIL --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Jenis Kelamin</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Laki-laki</span>
                    <span class="font-bold text-blue-600">{{ $mahasiswaLakiLaki ?? 0 }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $totalMahasiswa > 0 ? ($mahasiswaLakiLaki ?? 0) / $totalMahasiswa * 100 : 0 }}%"></div>
                </div>
                
                <div class="flex items-center justify-between mt-4">
                    <span class="text-gray-600">Perempuan</span>
                    <span class="font-bold text-pink-600">{{ $mahasiswaPerempuan ?? 0 }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-pink-600 h-2 rounded-full" style="width: {{ $totalMahasiswa > 0 ? ($mahasiswaPerempuan ?? 0) / $totalMahasiswa * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Stats</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between pb-3 border-b">
                    <span class="text-gray-600 text-sm">Mahasiswa Cuti</span>
                    <span class="font-bold text-yellow-600">{{ $mahasiswaCuti ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between pb-3 border-b">
                    <span class="text-gray-600 text-sm">Mahasiswa Lulus</span>
                    <span class="font-bold text-green-600">{{ $mahasiswaLulus ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 text-sm">Mahasiswa Dropout</span>
                    <span class="font-bold text-red-600">{{ $mahasiswaDropout ?? 0 }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.mahasiswa.create') }}" class="block w-full bg-blue-500 text-white text-center py-2 rounded-lg hover:bg-blue-600 transition-colors">
                    + Tambah Mahasiswa
                </a>
                <a href="{{ route('admin.jurusan.create') }}" class="block w-full bg-green-500 text-white text-center py-2 rounded-lg hover:bg-green-600 transition-colors">
                    + Tambah Jurusan
                </a>
                <a href="{{ route('admin.mata-kuliah.create') }}" class="block w-full bg-purple-500 text-white text-center py-2 rounded-lg hover:bg-purple-600 transition-colors">
                    + Tambah Mata Kuliah
                </a>
            </div>
        </div>

    </div>

</div>

{{-- CHART.JS SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Chart 1: Pie Chart - Status Mahasiswa
    const statusCtx = document.getElementById('statusChart');
    if (statusCtx) {
        new Chart(statusCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Cuti', 'Lulus', 'Dropout'],
                datasets: [{
                    label: 'Status Mahasiswa',
                    data: [
                        {{ $mahasiswaAktif ?? 0 }},
                        {{ $mahasiswaCuti ?? 0 }},
                        {{ $mahasiswaLulus ?? 0 }},
                        {{ $mahasiswaDropout ?? 0 }}
                    ],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderColor: [
                        'rgb(16, 185, 129)',
                        'rgb(251, 191, 36)',
                        'rgb(59, 130, 246)',
                        'rgb(239, 68, 68)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            font: { size: 12 }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        cornerRadius: 8
                    }
                }
            }
        });
    }

    // Chart 2: Bar Chart - Mahasiswa per Jurusan
    const jurusanCtx = document.getElementById('jurusanChart');
    if (jurusanCtx) {
        new Chart(jurusanCtx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($jurusanLabels ?? ['Jurusan 1', 'Jurusan 2', 'Jurusan 3']) !!},
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: {!! json_encode($jurusanData ?? [0, 0, 0]) !!},
                    backgroundColor: 'rgba(16, 185, 129, 0.8)',
                    borderColor: 'rgb(16, 185, 129)',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 10 },
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    }

    // Chart 3: Line Chart - Trend Pendaftaran
    const trendCtx = document.getElementById('trendChart');
    if (trendCtx) {
        new Chart(trendCtx.getContext('2d'), {
            type: 'line',
            data: {
                labels: {!! json_encode($angkatanLabels ?? ['2020', '2021', '2022', '2023', '2024']) !!},
                datasets: [{
                    label: 'Jumlah Mahasiswa Baru',
                    data: {!! json_encode($angkatanData ?? [0, 0, 0, 0, 0]) !!},
                    backgroundColor: 'rgba(147, 51, 234, 0.1)',
                    borderColor: 'rgb(147, 51, 234)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgb(147, 51, 234)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 10 },
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    }

});
</script>
@endsection