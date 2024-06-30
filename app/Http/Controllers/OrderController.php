<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Hewan $hewan)
    {
        return view('order.order', compact('hewan'));
    }

    public function store(Request $request, Hewan $hewan)
    {
        $hewan->update(['status' => 'Sold']);

        Order::create([
            'users_id' => auth()->user()->id,
            'hewan_id' => $hewan->id,
            'alamat' => $request->alamat,
            'pembayaran' => $request->pembayaran,
            'total_harga' => $request->harga
        ]);

        return redirect()->route('dashboard')->with('message', 'Orderan Berhasil');
    }
}
