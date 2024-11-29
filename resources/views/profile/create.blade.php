@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mt-3 mb-4">
                    <h2 class="text-2xl font-bold mb-6">Profil</h2>

                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                            <input type="file" accept=".jpg,.jpeg,.png"
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('cover') border-red-500 @enderror"
                                name="cover">
                            @error('cover')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text"
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('username') border-red-500 @enderror"
                                name="username">
                            @error('username')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Telpon</label>
                            <input type="text"
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('telpon') border-red-500 @enderror"
                                name="telpon">
                            @error('telpon')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                            <select
                                class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('jenis_kelamin') border-red-500 @enderror"
                                name="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                            <input type="text"
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('tempat_lahir') border-red-500 @enderror"
                                name="tempat_lahir">
                            @error('tempat_lahir')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                            <input type="date"
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('tgl_lahir') border-red-500 @enderror"
                                name="tgl_lahir">
                            @error('tgl_lahir')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Agama</label>
                            <select
                                class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('agama') border-red-500 @enderror"
                                name="agama">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            @error('agama')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                            <textarea
                                class= "border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('alamat') border-red-500 @enderror"
                                name="alamat"></textarea>
                            @error('alamat')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Hobi</label>
                            <select name="hobi[]" class="border rounded w-full py-2 px-3 text-gray-700 select-multiple" multiple>
                                @foreach ($hobi as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_hobi }}</option>
                                @endforeach
                            </select>
                            @error('hobi')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="{{ url('profile') }}"
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
