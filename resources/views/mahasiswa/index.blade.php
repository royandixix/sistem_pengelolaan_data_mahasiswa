@extends('mahasiswa.layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="space-y-4 sm:space-y-6 px-2 sm:px-4 pb-6">

    {{-- Header Section: Stack on Mobile, Row on Desktop --}}
    <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-xl shadow-lg overflow-hidden">
        <div class="px-5 py-6 sm:px-8 sm:py-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="text-left">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Halo, {{ $mahasiswa->nama }}</h1>
                    <p class="mt-2 text-blue-100 opacity-90 text-sm sm:text-base">Selamat datang di portal akademik Anda.</p>
                </div>
                <div class="flex md:justify-end">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-4 border border-white/20 w-full sm:w-auto text-center">
                        <p class="text-xs text-blue-200 uppercase font-semibold tracking-wider">IPK Kumulatif</p>
                        <p class="text-3xl sm:text-4xl font-black text-white mt-1">{{ number_format($ipk, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Overview: 2 columns on mobile, 4 on desktop --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
        @php
            $stats = [
                ['label' => 'Mata Kuliah', 'value' => $totalMataKuliah, 'color' => 'blue', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['label' => 'Total SKS', 'value' => $totalSks, 'color' => 'green', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['label' => 'Total Bobot', 'value' => number_format($totalBobot, 1), 'color' => 'purple', 'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z'],
                ['label' => 'Semester', 'value' => 'Aktif', 'color' => 'amber', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z']
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center space-x-3 sm:space-x-4">
                <div class="p-2 sm:p-3 bg-{{ $stat['color'] }}-50 rounded-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-{{ $stat['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $stat['value'] }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-tight">{{ $stat['label'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Visualisasi: Grid changes based on screen size --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        {{-- Chart Distribusi Nilai --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-5 border-b border-gray-100">
                <h2 class="font-bold text-gray-800">Distribusi Nilai Huruf</h2>
            </div>
            <div class="p-5" style="position: relative; height:300px; width:100%">
                <canvas id="nilaiChart"></canvas>
            </div>
        </div>

        {{-- Chart SKS per Mata Kuliah --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-5 border-b border-gray-100">
                <h2 class="font-bold text-gray-800">Beban SKS per Matakuliah</h2>
            </div>
            <div class="p-5" style="position: relative; height:300px; width:100%">
                <canvas id="sksChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Performa Akademik: Full width with horizontal scroll on very small screens if needed --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center">
            <h2 class="font-bold text-gray-800">Tren Performa Akademik</h2>
            <span class="hidden sm:inline-block px-3 py-1 bg-blue-50 text-blue-700 text-xs rounded-full font-medium">Analisis Nilai & Bobot</span>
        </div>
        <div class="p-5" style="position: relative; height:350px; width:100%">
            <canvas id="performaChart"></canvas>
        </div>
    </div>

</div>

{{-- Memasukkan library Chart.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mataKuliahs = @json($mataKuliahs);
        
        // Deteksi Lebar Layar untuk Penyesuaian Chart
        const isMobile = window.innerWidth < 768;
        
        // Setup Global Chart Defaults
        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.color = '#64748b';

        // --- 1. DOUGHNUT CHART (DISTRIBUSI NILAI) ---
        const counts = {};
        mataKuliahs.forEach(mk => counts[mk.nilai_huruf] = (counts[mk.nilai_huruf] || 0) + 1);

        new Chart(document.getElementById('nilaiChart'), {
            type: 'doughnut',
            data: {
                labels: Object.keys(counts),
                datasets: [{
                    data: Object.values(counts),
                    backgroundColor: ['#22c55e', '#3b82f6', '#f59e0b', '#ef4444', '#a855f7'],
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: isMobile ? 'bottom' : 'right',
                        labels: { padding: 20, usePointStyle: true }
                    }
                }
            }
        });

        // --- 2. BAR CHART (SKS) ---
        new Chart(document.getElementById('sksChart'), {
            type: 'bar',
            data: {
                labels: mataKuliahs.map(mk => {
                    const nama = mk.nama || mk.mata_kuliah;
                    return isMobile ? nama.substring(0, 8) + '..' : nama;
                }),
                datasets: [{
                    label: 'SKS',
                    data: mataKuliahs.map(mk => mk.sks),
                    backgroundColor: '#3b82f6',
                    borderRadius: 5
                }]
            },
            options: {
                indexAxis: isMobile ? 'y' : 'x', // Flip axis on mobile for better readability
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });

        // --- 3. LINE/BAR CHART (PERFORMA) ---
        const gradeMap = { 'A': 4, 'B': 3, 'C': 2, 'D': 1, 'E': 0 };
        new Chart(document.getElementById('performaChart'), {
            type: 'bar',
            data: {
                labels: mataKuliahs.map(mk => (mk.nama || mk.mata_kuliah).substring(0, 10)),
                datasets: [
                    {
                        type: 'line',
                        label: 'Bobot',
                        data: mataKuliahs.map(mk => mk.bobot),
                        borderColor: '#6366f1',
                        borderWidth: 3,
                        pointBackgroundColor: '#fff',
                        tension: 0.4,
                        yAxisID: 'y1'
                    },
                    {
                        label: 'Skala Grade',
                        data: mataKuliahs.map(mk => gradeMap[mk.nilai_huruf] || 0),
                        backgroundColor: 'rgba(34, 197, 94, 0.2)',
                        borderColor: '#22c55e',
                        borderWidth: 1,
                        borderRadius: 5,
                        yAxisID: 'y'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true, 
                        max: 4,
                        ticks: { stepSize: 1 },
                        title: { display: !isMobile, text: 'Grade (0-4)' }
                    },
                    y1: { 
                        position: 'right', 
                        beginAtZero: true,
                        grid: { drawOnChartArea: false },
                        title: { display: !isMobile, text: 'Bobot Nilai' }
                    }
                }
            }
        });
    });
</script>
@endsection