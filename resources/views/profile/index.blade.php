@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-center">
            <div class="w-full py-1">
                @if (session('error'))
                    <div class="bg-red-600 text-white p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h1 class="bg-gray-200 px-4 py-3 font-bold flex justify-between">
                        @if ($profile)
                            <p class="text-gray-800">Profile</p>
                            <a href="{{ route('password.edit') }}" class="text-gray-800 hover:text-gray-500">Password</a>
                        @endif
                    </h1>
                </div>

                @if ($profile)
                    <div class="bg-gray-100 py-6 px-4 lg:px-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- cover -->
                            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                                <img src="{{ asset('images/cover/' . $profile->cover) }}" class="rounded-full mx-auto mb-4"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                                <h5 class="text-lg font-bold mb-2">{{ $profile->username }}</h5>
                                <h6>{{ Auth::user()->name }}</h6>
                            </div>

                            <!-- detail -->
                            <div class="lg:col-span-2 bg-white shadow-md rounded-lg p-6">
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Telepon</div>
                                        <div class="w-3/4">{{ $profile->telpon }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Jenis kelamin</div>
                                        <div class="w-3/4">{{ $profile->jenis_kelamin }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Tempat lahir</div>
                                        <div class="w-3/4">{{ $profile->tempat_lahir }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Tanggal lahir</div>
                                        <div class="w-3/4">{{ $profile->tgl_lahir }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Agama</div>
                                        <div class="w-3/4">{{ $profile->agama }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Alamat</div>
                                        <div class="w-3/4">{{ $profile->alamat }}</div>
                                    </div>
                                    <hr class="my-2">
                                </div>
                                <div class="mb-4">
                                    <div class="flex">
                                        <div class="w-1/4 font-semibold">Hobi</div>
                                        <div class="w-3/4">
                                            <ol>
                                                @foreach ($profile->hobi as $data)
                                                    <li type="1" class="m-0 list-inside">{{ $data->nama_hobi }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2">
                                <div class="mt-4 text-right">
                                    <a href="{{ url('home') }}"
                                        class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Kembali</a>
                                    <a href="{{ route('profile.edit', $profile->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h2 class="text-lg font-semibold">Profile tidak ditemukan</h2>
                        <p class="text-gray-600 mb-4">Kamu belum mempunyai profile</p>
                        <a href="{{ route('profile.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Buat Profile</a>
                    </div>
                @endif  
            </div>
        </div>
    </div>
@endsection
