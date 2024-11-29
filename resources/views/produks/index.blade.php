@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl mt-3 font-bold mb-2">Produk</h1>
        <a href="{{ route('produk.create') }}" class="btn bg-blue-300 hover:bg-blue-400 text-black py-2 px-4 rounded">Tambah
            Produk</a>

        <!-- Tabel Produk -->
        <table class="table-auto w-full mt-3">
            <thead>
                <tr class="text-center bg-blue-200">
                    <th class="border border-black px-4 py-2">No</th>
                    <th class="border border-black px-4 py-2">Foto</th>
                    <th class="border border-black px-4 py-2">Produk</th>
                    <th class="border border-black px-4 py-2">Kategori</th>
                    <th class="border border-black px-4 py-2">Stok</th>
                    <th class="border border-black px-4 py-2">Harga</th>
                    <th class="border border-black px-4 py-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = ($produk->currentPage() - 1) * $produk->perPage() + 1; @endphp
                @foreach ($produk as $item)
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">{{ $no++ }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            <img src="{{ asset('/images/produk/' . $item->cover) }}" width="100">
                        </td>
                        <td class="border border-black px-4 py-2">{{ $item->nama_produk }}</td>
                        <td class="border border-black px-4 py-2">{{ $item->kategori->nama_kategori }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $item->stok }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            <div class="flex flex-wrap justify-center space-y-2 lg:space-y-0 lg:space-x-2">
                                <a href="{{ route('produk.edit', $item->id) }}"
                                    class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 w-full lg:w-auto text-center">Edit</a>
                                <a href="{{ route('produk.show', $item->id) }}"
                                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 w-full lg:w-auto text-center">Show</a>
                                <a href="{{ route('produk.destroy', $item->id) }}" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 w-full lg:w-auto text-center"
                                    data-confirm-delete="true">Hapus</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tampilkan pagination di bawah tabel -->
        <div class="mt-4">
            {{ $produk->links() }}
        </div>
    </div>
@endsection
