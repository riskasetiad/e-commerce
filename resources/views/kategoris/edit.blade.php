@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Kategori</div>
                    <div class="card-body">
                        <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori"
                                    value="{{ $kategori->nama_kategori }}">
                            </div>
                            @error('nama_kategori')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        <a href="{{ url('kategori') }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
