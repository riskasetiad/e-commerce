@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h1 class="bg-gray-200 px-4 py-3 font-bold">Edit Data Produk</h1>
                    <div class="p-4">
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Foto Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                                <img src="{{ asset('/images/produk/' . $produk->cover) }}" width="100" class="mb-2">
                                <input type="file" accept=".jpg,.jpeg,.png"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('cover') border-red-500 @enderror"
                                    name="cover">
                                @error('cover')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_produk') border-red-500 @enderror"
                                    name="nama_produk" value="{{ $produk->nama_produk }}">
                                @error('nama_produk')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kategori Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                                <select
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('id_kategori') border-red-500 @enderror"
                                    name="id_kategori">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Stok Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stok') border-red-500 @enderror"
                                    name="stok" value="{{ $produk->stok }}">
                                @error('stok')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Harga Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('harga') border-red-500 @enderror"
                                    name="harga" value="{{ $produk->harga }}">
                                @error('harga')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Deskripsi Produk -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                                <input type="text"
                                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror"
                                    name="deskripsi" value="{{ $produk->deskripsi }}">
                                @error('deskripsi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex justify-between">
                                <a href="{{ url('produk') }}"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Kembali</a>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
