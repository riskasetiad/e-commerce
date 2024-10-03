@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Data Produk</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                               <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    value="{{ $produk->nama_produk }}" disabled>
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori"
                                    value="{{ $produk->kategori }}" disabled>
                                <label class="form-label">Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{ $produk->stok }}" disabled>
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}" disabled>
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi"
                                    value="{{ $produk->deskripsi }}" disabled>
                                </div>

                            <a href="{{ url('produk') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
