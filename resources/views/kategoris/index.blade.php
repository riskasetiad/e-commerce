@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-2">Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="btn bg-blue-500 text-black py-2 px-4 rounded">Tambah Kategori</a>
        <table class="table-auto w-full mt-3">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kategori)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $kategori->nama_kategori }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-success">Ubah</a>

                                <a type="submit" class="btn btn-danger"
                                    href="{{ route('kategori.destroy', $kategori->id) }}"
                                    data-confirm-delete="true">Hapus</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
