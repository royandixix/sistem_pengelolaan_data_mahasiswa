@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold mb-2">Daftar Mahasiswa</h1>
            <p class="text-gray-600">Kelola data mahasiswa: tambah, edit, atau hapus.</p>
        </div>
        <a href="{{ route('admin.mahasiswa.create') }}" 
           class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
            Tambah Mahasiswa
        </a>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('admin.mahasiswa.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari nama, NIM, atau jurusan..."
               class="w-full md:w-1/3 border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="{{ request('search') }}">
    </form>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">NIM</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Jurusan</th>
                    <th class="px-4 py-2 border">Tanggal Lahir</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswas as $index => $mhs)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $mahasiswas->firstItem() + $index }}</td>
                        <td class="px-4 py-2 border">{{ $mhs->nim }}</td>
                        <td class="px-4 py-2 border">{{ $mhs->nama }}</td>
                        <td class="px-4 py-2 border">{{ $mhs->email }}</td>
                        <td class="px-4 py-2 border">{{ $mhs->jurusan->nama ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $mhs->tanggal_lahir->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $mhs->status }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?');">
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
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $mahasiswas->withQueryString()->links() }}
    </div>

</div>
@endsection
