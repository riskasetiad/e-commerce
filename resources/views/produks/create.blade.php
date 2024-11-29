@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h5 class="bg-gray-200 px-6 py-3 font-bold">Tambah Data Produk</h5>
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                        @csrf

                        <!-- Foto Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
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
                                   class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('nama_produk') border-red-500 @enderror"
                                   name="nama_produk" value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                            <select
                                class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('id_kategori') border-red-500 @enderror"
                                name="id_kategori">
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stok Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                            <input type="text"
                                   class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('stok') border-red-500 @enderror"
                                   name="stok" value="{{ old('stok') }}">
                            @error('stok')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                            <input type="text"
                                   class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('harga') border-red-500 @enderror"
                                   name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi Produk -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea
                                class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('deskripsi') border-red-500 @enderror"
                                name="deskripsi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between">
                            <a href="{{ url('produk') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none">Kembali</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
