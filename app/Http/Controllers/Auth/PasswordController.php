<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function edit()
    {
        $this->authorize('manage password');

        return view('auth.passwords.edit');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors([
            'current_password' => 'Password saat ini tidak sesuai.',
            'new_password' => 'Password baru harus memiliki setidaknya 6 karakter dan konfirmasi harus cocok.',
        ]);
    }
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('status', 'Password berhasil diubah!');
    }
}
