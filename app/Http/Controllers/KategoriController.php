<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = M_kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_kategori" => "required|min:8|max:255"
        ]);

        M_kategori::create([
            "nama_kategori" => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('kategori', 'kategori berhasil di tambahkan! yeayyy!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = M_kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = M_kategori::findOrFail($id);
        $request->validate([
            "nama_kategori" => "required|min:8|max:255"
        ]);

        M_kategori::update([
            "nama_kategori" => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('kategori', 'kategori berhasil di update! yeayyy!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = M_kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('kategori', 'kategori berhasil di dihapuss! yeayyy!!!');

    }
}
