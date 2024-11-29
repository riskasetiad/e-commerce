@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full py-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <h4 class="bg-gray-200 px-4 py-3 font-bold">Edit Password</h4>
                    <div class="mt-3">
                        @if (Route::has('password.request'))
                            <a class="text-sm ml-6 text-blue-500 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Lupa kata sandi?') }}
                            </a>
                        @endif
                    </div>

                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                            <ul>
                                @if ($errors->has('current_password'))
                                    <li class="list-disc ml-4">{{ $errors->first('current_password') }}</li>
                                @endif
                                @if ($errors->has('new_password'))
                                    <li class="list-disc ml-4">{{ $errors->first('new_password') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif


                    {{-- Success Message --}}
                    @if (session('status'))
                        <div class="bg-green-100 text-green-700 p-4 mb-6 rounded">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <div class="p-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat
                                    Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="block text-sm font-medium text-gray-700">Password
                                    Baru</label>
                                <input type="password" name="new_password" id="new_password"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="new_password_confirmation"
                                    class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>

                            <div class="flex justify-between">
                                <a href="{{ url('profile') }}"
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
