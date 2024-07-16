<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:150'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'phone' => ['max:150', 'nullable']
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        toastr()->success('Profile berhasil diupdate');
        return redirect()->back();
    }

    //update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);
        
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Password berhasil diubah');
        return redirect()->back();
    }
}
