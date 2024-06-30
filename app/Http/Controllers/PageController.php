<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->update();

            Auth::logout();
            return redirect(route('login'))->with('success', 'Password Berhasil Diubah');
        }

        return redirect(route('profile'))->with('message', 'Profile Berhasil Diubah');
    }
}
