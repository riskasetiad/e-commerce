@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h5 class="bg-gray-200 px-4 py-3 font-bold">Edit Data Hobi</h5>
                    <div class="p-4">
                        <form action="{{route('hobi.update', $hobi->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input Nama hobi -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Hobi</label>
                                <input type="text"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_hobi') border-red-500 @enderror"
                                       name="nama_hobi"
                                       value="{{ $hobi->nama_hobi }}">
                                @error('nama_hobi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex justify-between">
                                <a href="{{ url('hobi') }}"
                                   class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Kembali
                                </a>
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
