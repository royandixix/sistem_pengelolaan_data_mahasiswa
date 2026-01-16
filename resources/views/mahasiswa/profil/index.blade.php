@extends('mahasiswa.layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 sm:space-y-8 px-2 sm:px-4 pb-10">

    {{-- Header Section: Indigo/Blue Style --}}
    <div class="bg-gradient-to-br from-indigo-600 via-blue-700 to-blue-800 rounded-2xl shadow-lg overflow-hidden relative">
        <div class="px-6 py-8 sm:px-10 sm:py-10 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-6">
                {{-- Avatar --}}
                <div class="relative">
                    <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full border-4 border-white/20 overflow-hidden bg-white/10 backdrop-blur-md flex items-center justify-center text-white text-4xl font-bold shadow-xl">
                        {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                    </div>
                    <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-4 border-blue-700 rounded-full"></div>
                </div>
                
                <div class="text-center md:text-left">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">{{ $mahasiswa->nama }}</h1>
                    <p class="text-blue-100 opacity-80 mt-1">Mahasiswa Aktif • {{ $mahasiswa->jurusan->nama ?? 'Jurusan Belum Diatur' }}</p>
                    <div class="flex flex-wrap justify-center md:justify-start gap-2 mt-4">
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-medium text-white border border-white/10">NIM: {{ $mahasiswa->nim }}</span>
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-medium text-white border border-white/10">Smt: {{ $mahasiswa->semester ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Decorative circles --}}
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm flex items-center gap-3 animate-pulse">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <p class="text-sm font-bold">{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Sidebar Info (Read Only) --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-4 bg-indigo-500 rounded-full"></span>
                    Informasi Akademik
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">NIM</label>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $mahasiswa->nim }}</p>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Jurusan</label>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $mahasiswa->jurusan->nama ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tahun Angkatan</label>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">20{{ substr($mahasiswa->nim, 0, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-50 rounded-2xl p-6 border border-indigo-100">
                <p class="text-xs text-indigo-700 leading-relaxed font-medium">
                    <span class="text-lg block mb-1">🔐</span>
                    Data NIM, Semester, dan Jurusan dikunci secara otomatis. Hubungi bagian Administrasi jika terdapat kesalahan data.
                </p>
            </div>
        </div>

        {{-- Form Edit Section --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
                <h3 class="font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-4 bg-blue-500 rounded-full"></span>
                    Pengaturan Profil
                </h3>
                
                <form action="{{ route('mahasiswa.profil.update') }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="nama" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" 
                                   class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none"
                                   value="{{ old('nama', $mahasiswa->nama) }}">
                            @error('nama') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Email</label>
                            <input type="email" name="email" id="email" 
                                   class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none"
                                   value="{{ old('email', $mahasiswa->email) }}">
                            @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                                   class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none"
                                   value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}">
                            @error('tanggal_lahir') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-50 flex flex-col sm:flex-row justify-end gap-3">
                        <button type="reset" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-600 text-sm font-bold hover:bg-gray-200 transition">
                            Reset
                        </button>
                        <button type="submit" class="px-8 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection