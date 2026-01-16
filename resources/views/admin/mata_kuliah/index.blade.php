@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold mb-2">Daftar Mata Kuliah</h1>
            <p class="text-gray-600">Kelola mata kuliah: tambah, edit, atau hapus.</p>
        </div>
        <a href="{{ route('admin.mata-kuliah.create') }}" 
           class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
            Tambah Mata Kuliah
        </a>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('admin.mata-kuliah.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari kode, nama, atau dosen..."
               class="w-full md:w-1/3 border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ request('search') }}">
    </form>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Kode</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Dosen</th>
                    <th class="px-4 py-2 border">SKS</th>
                    <th class="px-4 py-2 border text-center">Status</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mataKuliahs as $index => $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $mk->kode }}</td>
                        <td class="px-4 py-2 border">{{ $mk->nama }}</td>
                        <td class="px-4 py-2 border">{{ $mk->dosen }}</td>
                        <td class="px-4 py-2 border">{{ $mk->sks }}</td>
                        <td class="px-4 py-2 border text-center capitalize">
                            @if($mk->status === 'aktif')
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Aktif</span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border text-center space-x-2">
                            <a href="{{ route('admin.mata-kuliah.edit', $mk->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.mata-kuliah.destroy', $mk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada mata kuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
