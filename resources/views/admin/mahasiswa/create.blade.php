@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Breadcrumb --}}
    <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.index') }}" class="hover:underline">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.mahasiswa.index') }}" class="hover:underline">Mahasiswa</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">Tambah Mahasiswa</li>
        </ol>
    </nav>

    {{-- Form Container --}}
    <div class="w-full px-4 md:px-20">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2">Tambah Mahasiswa</h1>
                <p class="text-gray-600">Isi form di bawah untuk menambahkan mahasiswa baru ke sistem.</p>
            </div>
            <a href="{{ route('admin.mahasiswa.index') }}"
               class="bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700 transition">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.mahasiswa.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- NIM --}}
            <div>
                <label for="nim" class="block font-semibold text-gray-700">NIM</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan Nomor Induk Mahasiswa yang unik.</p>
                <input type="text" name="nim" id="nim"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('nim') }}">
                @error('nim')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label for="nama" class="block font-semibold text-gray-700">Nama Lengkap</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan nama lengkap mahasiswa.</p>
                <input type="text" name="nama" id="nama"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('nama') }}">
                @error('nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block font-semibold text-gray-700">Email</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan email mahasiswa (unik).</p>
                <input type="email" name="email" id="email"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Jurusan --}}
            <div>
                <label for="jurusan_id" class="block font-semibold text-gray-700">Jurusan</label>
                <p class="text-gray-500 text-sm mb-1">Pilih jurusan mahasiswa dari daftar yang sudah ada.</p>
                <select name="jurusan_id" id="jurusan_id"
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->nama }}
                        </option>
                    @endforeach
                </select>
                @error('jurusan_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label for="tanggal_lahir" class="block font-semibold text-gray-700">Tanggal Lahir</label>
                <p class="text-gray-500 text-sm mb-1">Pilih tanggal lahir mahasiswa.</p>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block font-semibold text-gray-700">Status</label>
                <p class="text-gray-500 text-sm mb-1">Pilih status mahasiswa: aktif atau tidak aktif.</p>
                <select name="status" id="status"
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-3">
                <button type="reset"
                        class="px-6 py-3 rounded bg-gray-400 text-white font-semibold hover:bg-gray-500 transition">
                    Reset
                </button>
                <button type="submit"
                        class="px-6 py-3 rounded bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Simpan Mahasiswa
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
