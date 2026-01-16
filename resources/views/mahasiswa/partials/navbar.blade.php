<!-- SIDEBAR OVERLAY (Mobile) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 hidden transition-opacity duration-300"></div>

<!-- SIDEBAR -->
<nav id="sidebar"
     class="fixed left-0 top-[65px] w-72 h-[calc(100vh-65px)] bg-white border-r border-slate-100 shadow-2xl
            transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out z-50">

    <!-- Header Sidebar (Mobile Only) -->
    <div class="p-6 border-b border-slate-50 md:hidden bg-gradient-to-br from-slate-50 to-white">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-200">
                {{ substr(auth()->user()->mahasiswa->nama, 0, 1) }}
            </div>
            <div>
                <p class="font-bold text-slate-800 text-sm leading-tight">{{ auth()->user()->mahasiswa->nama }}</p>
                <p class="text-[10px] text-slate-500 uppercase tracking-widest mt-0.5">{{ auth()->user()->mahasiswa->nim }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col h-full justify-between p-4">
        <!-- Menu Links -->
        <ul class="space-y-2">
            <p class="px-4 text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">Menu Utama</p>

            <li>
                <a href="{{ route('mahasiswa.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                   {{ request()->routeIs('mahasiswa.index') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('mahasiswa.index') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-semibold text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.nilai.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                   {{ request()->routeIs('mahasiswa.nilai.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('mahasiswa.nilai.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-semibold text-sm">Nilai Akademik</span>
                </a>
            </li>

            <li>
                <a href="{{ route('mahasiswa.profil.index') }}"
                   class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                   {{ request()->routeIs('mahasiswa.profil.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('mahasiswa.profil.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-semibold text-sm">Profil Saya</span>
                </a>
            </li>
        </ul>

        <!-- Logout Button -->
        <div class="mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-rose-500 hover:bg-rose-50 rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 text-rose-400 group-hover:text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="font-bold text-sm">Keluar Sistem</span>
                </button>
            </form>
        </div>
    </div>
</nav>
