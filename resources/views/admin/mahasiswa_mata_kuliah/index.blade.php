@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold mb-2">Data Nilai Mahasiswa</h1>
            <p class="text-gray-600">Kelola nilai mahasiswa: tambah, edit, atau hapus.</p>
        </div>
        <a href="{{ route('admin.mahasiswa_mata_kuliah.create') }}" 
           class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
            Tambah Nilai
        </a>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('admin.mahasiswa_mata_kuliah.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari nama mahasiswa atau mata kuliah..."
               class="w-full md:w-1/3 border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ request('search') }}">
    </form>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Mahasiswa</th>
                    <th class="px-4 py-2 border">Mata Kuliah</th>
                    <th class="px-4 py-2 border">Nilai</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mataKuliahs as $index => $mk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $mk->mahasiswa->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $mk->mataKuliah->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $mk->nilai ?? '-' }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('admin.mahasiswa_mata_kuliah.edit', $mk->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.mahasiswa_mata_kuliah.destroy', $mk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">Belum ada data nilai mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $mataKuliahs->withQueryString()->links() }}
    </div>

</div>
@endsection
