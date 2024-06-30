<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function dashboard()
    {
        $dataHewan = Hewan::all();
        $order = Order::all();
        return view('dashboard', compact('dataHewan', 'order'));
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

    public function myOrder()
    {
        $dataOrder = Order::with('hewan')->where('users_id', auth()->user()->id)->get();
        return view('order.myOrder', compact('dataOrder'));
    }

    public function orderList()
    {
        $dataOrder = Order::with(['hewan', 'users'])->get();
        return view('order.orderList', compact('dataOrder'));
    }
}
