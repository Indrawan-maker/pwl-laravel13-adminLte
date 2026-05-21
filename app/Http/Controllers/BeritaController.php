<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_berita;
use App\Models\M_kategori;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = M_berita::with('kategori')->get();    
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = M_kategori::all();
        return view('admin.berita.create', compact('kategori'));
    }

        public function store(Request $request)
    {
        $request->validate([
            "judul_berita" => "required|min:8|max:255",
            "isi_berita" => "required|min:12|max:500",
        ]);
        $namaGambar = null;
        if($request->hasFile('gambar')){

            $namaGambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('uploads'), $namaGambar);
        }

        M_berita::create([
             "kategori_id" => $request->kategori_id,
            "judul_berita" => $request->judul_berita,
            "isi_berita" => $request->isi_berita,
            "gambar" => $namaGambar,
        ]);

        return redirect()->route('berita.index')->with('berita', 'berita berhasil di tambahkan! yeayyy!!!');
    }

        public function edit(string $id)
    {
        $berita = M_berita::findOrFail($id);
        $kategori = M_kategori::all();
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $berita = M_berita::findOrFail($id);
        $request->validate([
            "judul_berita" => "required|min:8|max:255",
            "isi_berita" => "required|min:8|max:500"
        ]);

        $berita->update([
            "judul_berita" => $request->judul_berita,
            "isi_berita" => $request->isi_berita,
            "gambar" => $request->gambar
        ]);

        return redirect()->route('berita.index')->with('berita', 'berita berhasil di update! yeayyy!!!');
    }

     public function destroy(string $id)
    {
        $berita = M_berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('berita', 'berita berhasil di dihapuss! yeayyy!!!');

    }

    
}
