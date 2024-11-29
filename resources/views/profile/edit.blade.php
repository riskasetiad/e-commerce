@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h1 class="bg-gray-200 px-4 py-3 font-bold">Edit Profile</h1>
                    <div class="p-4">
                        <form action="{{ route('profile.update', $profile->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Cover --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cover</label>
                                @if ($profile->cover)
                                    <img src="{{ asset('images/cover/' . $profile->cover) }}" alt="Cover"
                                        class="mb-3 h-40 w-40 object-cover">
                                @else
                                    <p class="text-gray-500 text-sm">Tidak ada gambar saat ini.</p>
                                @endif
                                <input type="file" name="cover" accept=".jpg,.jpeg,.png"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('cover') border-red-500 @enderror"
                                    value="{{ old('cover', $profile->cover) }}">
                                @error('cover')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Nama --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                                <input type="text" name="username"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('username') border-red-500 @enderror"
                                    value="{{ $profile->username }}">
                                @error('username')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Telpon --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Telpon</label>
                                <input type="text" name="telpon"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('telpon') border-red-500 @enderror"
                                    value="{{ $profile->telpon }}">
                                @error('telpon')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('jenis_kelamin') border-red-500 @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Perempuan"
                                        {{ $profile->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    <option value="Laki-laki"
                                        {{ $profile->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tempat Lahir --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('tempat_lahir') border-red-500 @enderror"
                                    value="{{ $profile->tempat_lahir }}">
                                @error('tempat_lahir')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('tgl_lahir') border-red-500 @enderror"
                                    value="{{ $profile->tgl_lahir }}">
                                @error('tgl_lahir')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Agama</label>
                                <select name="agama"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('agama') border-red-500 @enderror">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" {{ $profile->agama == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $profile->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ $profile->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Budha" {{ $profile->agama == 'Budha' ? 'selected' : '' }}>Budha
                                    </option>
                                    <option value="Hindu" {{ $profile->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Konghucu" {{ $profile->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                </select>
                                @error('agama')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                                <textarea name="alamat"
                                    class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('alamat') border-red-500 @enderror">{{ $profile->alamat }}</textarea>
                                @error('alamat')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Hobi --}}
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Hobi</label>
                                <select name="hobi[]" class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none select-multiple" multiple>
                                    @foreach ($hobi as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_hobi }}</option>
                                    @endforeach
                                </select>
                                @error('id_hobi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Buttons --}}
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
    </div>
@endsection
