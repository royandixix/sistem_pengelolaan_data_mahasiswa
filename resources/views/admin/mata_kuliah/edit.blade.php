@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Breadcrumb --}}
    <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.index') }}" class="hover:underline">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.mata-kuliah.index') }}" class="hover:underline">Mata Kuliah</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">Edit Mata Kuliah</li>
        </ol>
    </nav>

    {{-- Form Container --}}
    <div class="w-full px-4 md:px-20">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2">Edit Mata Kuliah</h1>
                <p class="text-gray-600">Ubah data mata kuliah sesuai kebutuhan.</p>
            </div>
            <a href="{{ route('admin.mata-kuliah.index') }}"
               class="bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700 transition">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.mata-kuliah.update', $mataKuliah->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Kode --}}
            <div>
                <label for="kode" class="block font-semibold text-gray-700">Kode Mata Kuliah</label>
                <input type="text" name="kode" id="kode" 
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('kode', $mataKuliah->kode) }}">
                @error('kode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label for="nama" class="block font-semibold text-gray-700">Nama Mata Kuliah</label>
                <input type="text" name="nama" id="nama"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('nama', $mataKuliah->nama) }}">
                @error('nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Dosen --}}
            <div>
                <label for="dosen" class="block font-semibold text-gray-700">Dosen</label>
                <input type="text" name="dosen" id="dosen"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('dosen', $mataKuliah->dosen) }}">
                @error('dosen')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- SKS --}}
            <div>
                <label for="sks" class="block font-semibold text-gray-700">SKS</label>
                <input type="number" name="sks" id="sks" min="1"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('sks', $mataKuliah->sks) }}">
                @error('sks')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block font-semibold text-gray-700">Status</label>
                <select name="status" id="status" 
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="aktif" {{ old('status', $mataKuliah->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status', $mataKuliah->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-3">
                <button type="reset" 
                        class="px-6 py-3 rounded bg-gray-400 text-white hover:bg-gray-500 transition">
                    Reset
                </button>
                <button type="submit" 
                        class="px-6 py-3 rounded bg-blue-600 text-white hover:bg-blue-700 transition">
                    Update Mata Kuliah
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
