@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-2">Produk</h1>
        <a href="{{ route('produk.create') }}" class="btn bg-blue-100 text-black py-2 px-4 rounded">Tambah Produk</a>
        <table class="table-auto w-full mt-3">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Foto</th>
                    <th class="border px-4 py-2">Produk</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($produk as $produk)
                    <tr>
                        <td class="border px-4 py-2">{{ $no++ }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('/images/produk/' . $produk->cover) }}" width="100">
                        </td>
                        <td class="border px-4 py-2">{{ $produk->nama_produk }}</td>
                        <td class="border px-4 py-2">{{ $produk->kategori->nama_kategori }}</td>
                        <td class="border px-4 py-2">{{ $produk->stok }}</td>
                        <td class="border px-4 py-2">{{ $produk->harga }}</td>
                        <td class="border px-4 py-2">{{ $produk->deskripsi }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-success">Ubah</a>
                                <a type="submit" class="btn btn-danger" href="{{ route('produk.destroy', $produk->id) }}"
                                    data-confirm-delete="true">Hapus</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
