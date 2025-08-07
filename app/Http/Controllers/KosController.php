<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $kos = Kos::all();
        return view('kos.index', compact('kos'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'harga' => 'required|numeric',
            'jumlah_kamar' => 'required|integer',
            'fasilitas' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kos', 'public');
        }

        Kos::create($data);

        return redirect()->route('kos.index')->with('success', 'Data kos berhasil ditambahkan');
    }

    // Fungsi lainnya: show, edit, update, destroy
}