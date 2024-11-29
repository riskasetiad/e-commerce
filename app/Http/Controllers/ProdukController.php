<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::paginate(5);
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('produks/index', compact('produk'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('produks.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cover' => 'required|mimes:jpg,jpeg,png|max:65535',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
        ], [
            'cover.required' => 'Foto harus diisi!',
            'nama_produk.required' => 'Nama Produk harus diisi!',
            'id_kategori.required' => 'Kategori harus diisi!',
            'stok.required' => 'Stok minimal 1!',
            'harga.required' => 'Harga minimal 1!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
        ]
        );

        $produk = new produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk', $name);
            $produk->cover = $name;
        }

        $produk->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan!')->autoClose(1000);
        return redirect()->route('produk.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::all();
        $produk = produk::findOrFail($id);
        return view('produks.show', compact('produk', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::findOrFail($id);
        $kategori = kategori::all();

        return view('produks.edit', compact('produk', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cover' => 'mimes:jpg,jpeg,png|max:65535',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1',
            'deskripsi' => 'required|string',
        ], [
            'cover.required' => 'Foto harus diisi!',
            'nama_produk.required' => 'Nama Produk harus diisi!',
            'id_kategori.required' => 'Kategori harus diisi!',
            'stok.required' => 'Stok minimal 1!',
            'harga.required' => 'Harga minimal 1!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
        ]
        );

        $produk = produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        //upload img
        if ($request->hasFile('cover')) {
            $produk->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk', $name);
            $produk->cover = $name;
        }

        $produk->save();
        Alert::success('Success', 'Data Berhasil Diperbarui!')->autoClose(1000);
        return redirect()->route('produk.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $produk = produk::findOrFail($id);
       $produk->delete();
        $produk->deleteImage();
        Alert::success('Success', 'Data Berhasil Dihapus!')->autoClose(1000);
        return redirect()->route('produk.index');
    }
}
