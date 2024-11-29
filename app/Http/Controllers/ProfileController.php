<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Hobi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('can:access profile');
    }

    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil profil user yang sedang login
        $profile = $user->profile()->with('hobi')->first(); // Ambil relasi profile

        // Cek apakah pengguna memiliki profil
        $profile = Profile::where('user_id', auth()->id())->first();

        $hobi = Hobi::where('id_hobi');

        // Jika profil ditemukan, tampilkan view
        return view('profile.index', compact('profile', 'hobi'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingProfile = Profile::where('user_id', auth()->id())->first();

        if ($existingProfile) {
            // Jika sudah ada profil, arahkan ke halaman profil atau tampilkan pesan
            return redirect()->route('profile.index')->with('error', 'Anda sudah memiliki profile!');
        }

        $hobi = Hobi::all();
        return view('profile.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek apakah pengguna sudah memiliki profil
        $existingProfile = Profile::where('user_id', auth()->id())->first();

        if ($existingProfile) {
            // Jika sudah ada profil, batalkan penyimpanan dan kembali ke halaman profil
            return redirect()->route('profile.index')->with('error', 'Anda sudah memiliki profile!');
        }

        $validated = $request->validate([
            'cover' => 'required|mimes:jpg,jpeg,png|max:65535',
            'username' => 'required',
            'telpon' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
        ], [
            'cover.required' => 'Foto harus diisi!',
            'username.required' => 'Nama harus diisi!',
            'telpon.required' => 'Telpon harus diisi!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin!',
            'tempat_lahir.required' => 'Tempat lahir harus diisi!',
            'tgl_lahir.required' => 'Anda belum cukup umur!',
            'agama.required' => 'Pilih agama!',
            'alamat.required' => 'Alamat harus diisi!',
            'hobi.required' => 'Hobi harus diisi!',
        ]
        );

        $profile = new profile();
        $profile->user_id = auth()->id();
        $profile->username = $request->username;
        $profile->telpon = $request->telpon;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;

        // upload foto
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/cover/', $name);
            $profile->cover = $name;
        }
        $profile->save();
        $profile->hobi()->attach($request->hobi);
        Alert::success('Success', 'data berhasil ditambahkan')->autoclose(1000);
        return redirect()->route('profile.index', $profile->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hobi = Hobi::all();
        $profile = Profile::findOrFail($id);
        // Pastikan profil yang diminta milik user yang sedang login
        if ($profile->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('profile.edit', compact('profile', 'hobi'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cover' => 'mimes:jpg,jpeg,png|max:65535',
            'username' => 'required',
            'telpon' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'array', // Pastikan hobi berupa array
            'hobi.*' => 'integer|exists:hobis,id', // Validasi setiap hobi yang dipilih
        ], [
            'username.required' => 'Nama harus diisi!',
            'telpon.required' => 'Telpon harus diisi!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin!',
            'tempat_lahir.required' => 'Tempat lahir harus diisi!',
            'tgl_lahir.required' => 'Anda belum cukup umur!',
            'agama.required' => 'Pilih agama!',
            'alamat.required' => 'Alamat harus diisi!',
            'hobi.required' => 'Hobi harus diisi!',
        ]
        );

        $profile = Profile::findOrFail($id);
        $profile->username = $request->username;
        $profile->telpon = $request->telpon;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;

        //upload img
        if ($request->hasFile('cover')) {
            $profile->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/cover', $name);
            $profile->cover = $name;
        }

        $profile->save();
        $profile->hobi()->sync($request->hobi); // Sinkronkan hobi terpilih dengan tabel pivot
        Alert::success('Success', 'Data Berhasil Diperbarui!')->autoClose(1000);
        return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
