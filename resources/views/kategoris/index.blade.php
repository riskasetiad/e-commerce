@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl mt-3 font-bold mb-2">Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="btn bg-blue-300 hover:bg-blue-400 text-black py-2 px-4 rounded">Tambah
            kategori</a>
        <table class="table-auto w-full mt-3">
            <thead>
                <tr class="text-center bg-blue-200">
                    <th class="border border-black">No</th>
                    <th class="border border-black px-4 py-2">Kategori</th>
                    <th class="border border-black px-4 py-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = ($kategori->currentPage() - 1) * $kategori->perPage() + 1; @endphp
                @foreach ($kategori as $item)
                    <tr>
                        <td class="border border-black text-center">{{ $no++ }}</td>
                        <td class="border border-black px-4 py-2">{{ $item->nama_kategori }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{-- <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE') --}}   
                            <div class="flex flex-wrap justify-center space-y-2 lg:space-y-0 lg:space-x-2">
                                <a href="{{ route('kategori.edit', $item->id) }}"
                                    class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Edit</a>
                                <a href="{{ route('kategori.destroy', $item->id) }}"
                                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600"
                                    data-confirm-delete="true">Delete</a>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Tampilkan pagination di bawah tabel -->
        <div class="mt-4">
            {{ $kategori->links() }}
        </div>
    </div>
@endsection
