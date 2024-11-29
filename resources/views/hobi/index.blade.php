@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl mt-3 font-bold mb-2">Hobi</h1>
        <div class="mb-4">
            <a href="{{ route('hobi.create') }}" class="btn bg-blue-300 hover:bg-blue-400 text-black py-2 px-4 rounded">Tambah Hobi</a>
        </div>
        <table class="table-auto w-full mt-3">
            <thead>
                <tr class="text-center bg-blue-200">
                    <th class="border border-black">No</th>
                    <th class="border border-black px-4 py-2">Hobi</th>
                    <th class="border border-black px-4 py-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @php $no = ($hobi->currentPage() - 1) * $hobi->perPage() + 1; @endphp
                @foreach ($hobi as $item)
                    <tr>
                        <td class="border border-black text-center">{{ $no++ }}</td>
                        <td class="border border-black px-4 py-2">{{ $item->nama_hobi }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            {{-- <form action="{{ route('hobi.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 ml-2" data-confirm-delete="true">Hapus</button> --}}
                                <a href="{{ route('hobi.edit', $item->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Edit</a>
                                <a href="{{ route('hobi.destroy', $item->id) }}" class="btn btn-danger"
                                    data-confirm-delete="true">Delete</a>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tampilkan pagination di bawah tabel -->
        <div class="mt-4">
            {{ $hobi->links() }}
        </div>
    </div>
@endsection
