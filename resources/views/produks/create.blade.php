@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Produk</div>
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                                @error('cover')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                    name="nama_produk">
                                @error('nama_produk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Kategori</label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori">
                                    @error('id_kategori')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <label class="form-label">Stok</label>
                                <input type="text" class="form-control @error('id_kategori') is-invalid @enderror"
                                    name="stok">
                                @error('stok')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga">
                                @error('harga')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi">
                                @error('deskripsi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="{{ url('produk') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
