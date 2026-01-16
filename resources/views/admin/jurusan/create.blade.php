@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Breadcrumb --}}
    <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.index') }}" class="hover:underline">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.jurusan.index') }}" class="hover:underline">Jurusan</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">Tambah Jurusan</li>
        </ol>
    </nav>

    {{-- Form Container --}}
    <div class="w-full px-4 md:px-20">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2">Tambah Jurusan</h1>
                <p class="text-gray-600">Isi form di bawah untuk menambahkan jurusan baru ke sistem.</p>
            </div>
            <a href="{{ route('admin.jurusan.index') }}" 
               class="bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700 transition">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Kode Jurusan --}}
            <div>
                <label for="kode" class="block font-semibold text-gray-700">Kode Jurusan</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan kode unik jurusan (misal: TI, SI, AK).</p>
                <input type="text" name="kode" id="kode"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('kode') }}">
                @error('kode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nama Jurusan --}}
            <div>
                <label for="nama" class="block font-semibold text-gray-700">Nama Jurusan</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan nama lengkap jurusan (misal: Teknik Informatika).</p>
                <input type="text" name="nama" id="nama"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('nama') }}">
                @error('nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block font-semibold text-gray-700">Deskripsi</label>
                <p class="text-gray-500 text-sm mb-1">Tambahkan deskripsi singkat tentang jurusan ini.</p>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block font-semibold text-gray-700">Status</label>
                <p class="text-gray-500 text-sm mb-1">Pilih status jurusan: aktif atau tidak aktif.</p>
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
                    Simpan Jurusan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
