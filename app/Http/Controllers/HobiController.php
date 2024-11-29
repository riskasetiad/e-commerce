<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobi = Hobi::paginate(5);
        confirmDelete('Hapus!', 'Anda yakin ingin menghapusnya?');
        return view('hobi.index', compact('hobi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobi.create');
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
            'nama_hobi' => 'required|unique:hobis',
        ], [
            'nama_hobi.required' => 'hobi harus diisi!',
        ]);

        $hobi = new Hobi;
        $hobi->nama_hobi = $request->nama_hobi;
        $hobi->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan!')->autoClose(1000);
        return redirect()->route('hobi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
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
            'nama_hobi' => 'required|unique:hobis',
        ], [
            'nama_hobi.required' => 'hobi harus diisi!',
        ]);

        $hobi = Hobi::findOrFail($id);
        $hobi->nama_hobi = $request->nama_hobi;
        $hobi->save();
        Alert::success('Success', 'Data Berhasil Diperbarui!')->autoClose(1000);
        return redirect()->route('hobi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        Alert::success('Success', 'Data Berhasil Dihapus!')->autoClose(1000);
        return redirect()->route('hobi.index');
    }
}
