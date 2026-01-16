@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Breadcrumb --}}
    <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.index') }}" class="hover:underline">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="{{ route('admin.mahasiswa_mata_kuliah.index') }}" class="hover:underline">Mata Kuliah Mahasiswa</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">Edit Nilai</li>
        </ol>
    </nav>

    {{-- Form Container --}}
    <div class="w-full px-4 md:px-20">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2">Edit Nilai Mahasiswa</h1>
                <p class="text-gray-600">Ubah data nilai mahasiswa pada mata kuliah tertentu.</p>
            </div>
            <a href="{{ route('admin.mahasiswa_mata_kuliah.index') }}"
               class="bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700 transition">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.mahasiswa_mata_kuliah.update', $mahasiswa_mata_kuliah->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Mahasiswa --}}
            <div>
                <label for="mahasiswa_id" class="block font-semibold text-gray-700">Mahasiswa</label>
                <p class="text-gray-500 text-sm mb-1">Pilih mahasiswa yang akan diberikan nilai.</p>
                <select name="mahasiswa_id" id="mahasiswa_id"
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($mahasiswas as $mhs)
                        <option value="{{ $mhs->id }}" {{ $mahasiswa_mata_kuliah->mahasiswa_id == $mhs->id ? 'selected' : '' }}>
                            {{ $mhs->nama }} ({{ $mhs->nim }})
                        </option>
                    @endforeach
                </select>
                @error('mahasiswa_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Mata Kuliah --}}
            <div>
                <label for="mata_kuliah_id" class="block font-semibold text-gray-700">Mata Kuliah</label>
                <p class="text-gray-500 text-sm mb-1">Pilih mata kuliah yang akan dinilai.</p>
                <select name="mata_kuliah_id" id="mata_kuliah_id"
                        class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($mataKuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ $mahasiswa_mata_kuliah->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                            {{ $mk->nama }} ({{ $mk->kode }})
                        </option>
                    @endforeach
                </select>
                @error('mata_kuliah_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Nilai --}}
            <div>
                <label for="nilai" class="block font-semibold text-gray-700">Nilai</label>
                <p class="text-gray-500 text-sm mb-1">Masukkan nilai mahasiswa (opsional).</p>
                <input type="text" name="nilai" id="nilai"
                       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ old('nilai', $mahasiswa_mata_kuliah->nilai) }}">
                @error('nilai')
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
                    Update Nilai
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
