@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4 md:px-20">

    <nav class="text-gray-500 text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="{{ route('admin.index') }}" class="hover:underline">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-700 font-semibold">Jurusan</li>
        </ol>
    </nav>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Data Jurusan</h2>
        <a href="{{ route('admin.jurusan.create') }}"
           class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Jurusan
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow bg-white">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Kode Jurusan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama Jurusan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($jurusans as $key => $j)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-3 text-gray-700 font-medium">{{ $jurusans->firstItem() + $key }}</td>
                    <td class="px-6 py-3 text-gray-700">{{ $j->kode }}</td>
                    <td class="px-6 py-3 text-gray-700">{{ $j->nama }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ Str::limit($j->deskripsi, 50) }}</td>
                    <td class="px-6 py-3 text-center">
                        @if($j->status === 'aktif')
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Aktif</span>
                        @else
                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-3 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.jurusan.edit', $j->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.jurusan.destroy', $j->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm font-medium">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 px-6 py-3 flex justify-end">
            {{ $jurusans->links() }}
        </div>
    </div>

</div>
@endsection
