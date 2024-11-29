@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <div class="bg-gray-100 w-full rounded-lg overflow-hidden">
                <h1 class="bg-gray-200 px-4 py-3 font-bold">
                    <p class="text-gray-800">Produk</p>
                </h1>
                <div class="py-6 px-4 lg:px-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- cover -->
                        <div class="bg-white shadow-md rounded-lg p-6 text-center">
                            <img src="{{ asset('images/produk/' . $produk->cover) }}" class="rounded-lg mx-auto mb-4"
                                style="width: 180px; height: 180px; object-fit: cover;">
                        </div>

                        <!-- detail -->
                        <div class="lg:col-span-2 bg-white shadow-md rounded-lg p-6">
                            <div class="mb-4">
                                <div class="flex">
                                    <div class="w-1/4 font-semibold">Nama Produk</div>
                                    <div class="w-3/4">{{ $produk->nama_produk }}</div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="mb-4">
                                <div class="flex">
                                    <div class="w-1/4 font-semibold">Kategori</div>
                                    <div class="w-3/4">
                                        {{ $produk->kategori->nama_kategori ?? 'Tidak ada Kategori' }}
                                    </div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="mb-4">
                                <div class="flex">
                                    <div class="w-1/4 font-semibold">Stok</div>
                                    <div class="w-3/4">{{ $produk->stok }}</div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="mb-4">
                                <div class="flex">
                                    <div class="w-1/4 font-semibold">Harga</div>
                                    <div class="w-3/4">{{ number_format($produk->harga, 0, ',', '.') }}</div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="mb-4">
                                <div class="flex">
                                    <div class="w-1/4 font-semibold">Deskripsi</div>
                                    <div class="w-3/4 break-words">{{ $produk->deskripsi }}</div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="mt-4 text-right">
                                <a href="{{ url('produk') }}"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
