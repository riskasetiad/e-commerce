@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Produk</div>
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">

                                <label class="form-label">Foto</label>
                                <img src="{{ asset('/images/produk/' . $produk->cover) }}" width="100">
                                <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                    name="cover">
                                @error('cover')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                    name="nama_produk" value="{{ $produk->nama_produk }}">
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
                                <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                    name="stok" value="{{ $produk->stok }}">
                                @error('stok')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ $produk->harga }}">
                                @error('harga')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" value="{{ $produk->deskripsi }}">
                                @error('deskripsi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="{{ url('produk') }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
