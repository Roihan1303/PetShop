<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hewan::all();
        return view('hewan.hewan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hewan.addHewan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Proses Membahkan File Image Secara Lokal
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/images', $fileName);

        Hewan::create([
            'jenis_hewan' => $request->jenis_hewan,
            'harga' => $request->harga,
            'gambar' => $fileName,
            'status' => 'Avaliable'
        ]);

        return redirect()->route('hewan.index')->with('message', 'Hewan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hewan $hewan)
    {
        return view('hewan.editHewan', compact('hewan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hewan $hewan)
    {
        $file = $request->file('image');
        if ($file) {
            Storage::delete('public/images/' . $hewan->gambar);

            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);

            $hewan->update(['gambar' => $fileName]);
        }

        $hewan->update([
            'jenis_hewan' => $request->jenis_hewan,
            'harga' => $request->harga
        ]);

        return redirect()->route('hewan.index')->with('message', 'Edit Data Hewan Sukses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hewan $hewan)
    {
        Storage::delete('public/images/' . $hewan->gambar);
        $hewan->delete();

        return redirect()->route('hewan.index')->with('message', 'Data Hewan Berhasil Dihapus');
    }
}
