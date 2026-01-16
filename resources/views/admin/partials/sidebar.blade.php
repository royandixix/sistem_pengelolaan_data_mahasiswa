{{-- FILE: resources/views/admin/partials/sidebar.blade.php --}}

<aside id="sidebar" class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-gray-100 w-64 flex-shrink-0 flex-col shadow-2xl fixed md:static inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
    {{-- LOGO / HEADER --}}
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-lg">Admin Panel</h1>
                    <p class="text-xs text-gray-400">Sistem Akademik</p>
                </div>
            </div>
            {{-- Close Button (Mobile Only) --}}
            <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- NAVIGATION MENU --}}
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        {{-- Dashboard --}}
        <a href="{{ route('admin.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            {{ request()->routeIs('admin.dashboard') 
                ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/50' 
                : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        {{-- Divider --}}
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Master Data</p>
        </div>

        {{-- Jurusan --}}
        <a href="{{ route('admin.jurusan.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            {{ request()->routeIs('admin.jurusan.*') 
                ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/50' 
                : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.jurusan.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span class="font-medium">Jurusan</span>
        </a>

        {{-- Mahasiswa --}}
        <a href="{{ route('admin.mahasiswa.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            {{ request()->routeIs('admin.mahasiswa.*') 
                ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/50' 
                : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.mahasiswa.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span class="font-medium">Mahasiswa</span>
        </a>

        {{-- Mata Kuliah --}}
        <a href="{{ route('admin.mata-kuliah.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            {{ request()->routeIs('admin.mata-kuliah.*') 
                ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/50' 
                : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.mata-kuliah.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="font-medium">Mata Kuliah</span>
        </a>

        {{-- Divider --}}
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Akademik</p>
        </div>

        {{-- Input Nilai --}}
        <a href="{{ route('admin.mahasiswa_mata_kuliah.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            {{ request()->routeIs('admin.mahasiswa_mata_kuliah.*') 
                ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/50' 
                : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('admin.mahasiswa_mata_kuliah.*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
            </svg>
            <span class="font-medium">Input Nilai</span>
        </a>
    </nav>

    {{-- FOOTER INFO --}}
    <div class="p-4 border-t border-gray-700">
        <div class="bg-gray-700/50 rounded-lg p-3">
            <div class="flex items-center gap-2 mb-1">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-semibold text-gray-300">System Status</span>
            </div>
            <p class="text-xs text-gray-400">All systems operational</p>
        </div>
    </div>
</aside>

{{-- OVERLAY (Mobile Only) --}}
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

<style>
    /* Custom scrollbar for sidebar */
    #sidebar nav::-webkit-scrollbar {
        width: 6px;
    }

    #sidebar nav::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }

    #sidebar nav::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }

    #sidebar nav::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }
</style>