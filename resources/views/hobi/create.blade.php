@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h5 class="bg-gray-200 px-6 py-3 font-bold">Tambah Data hobi</h5>
                    <form action="{{ route('hobi.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                        @csrf

                        <!-- Nama hobi Input -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama hobi</label>
                            <input type="text" name="nama_hobi"
                                class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-300 @error('nama_hobi') border-red-500 @enderror"
                                value="{{ old('nama_hobi') }}">

                            <!-- Error Message -->
                            @error('nama_hobi')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between">
                            <a href="{{ url('hobi') }}"
                                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none">Kembali</a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
