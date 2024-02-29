<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $buku = buku::paginate(6);
        $title = "Buku";
        return view('admin.buku.index', compact('title', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBuku::all();
        $title = "Buku";
        return view('admin.buku.add', compact('title', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|max:255',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'TahunTerbit' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        $input['kategori_id'] = $request->kategori_id;
        $input['judul'] = $request->judul;
        $input['penulis'] = $request->penulis;
        $input['penerbit'] = $request->penerbit;
        $input['TahunTerbit'] = $request->TahunTerbit;
        $input['deskripsi'] = $request->deskripsi;

        Buku::create($input);
        return redirect()->route('admin.buku.index')->with('success', 'data tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = KategoriBuku::all();
        $title = "Buku";
        return view('admin.buku.edit', compact('title', 'buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'kategori_id' => 'required|max:255',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'TahunTerbit' => 'required|max:255',
            'deskripsi' => 'required|max:255',
        ]);



        $input['kategori_id'] = $request->kategori_id;
        $input['judul'] = $request->judul;
        $input['penulis'] = $request->penulis;
        $input['penerbit'] = $request->penerbit;
        $input['TahunTerbit'] = $request->TahunTerbit;
        $input['deskripsi'] = $request->deskripsi;

        // Assuming you have retrieved the book to update (e.g., using find())
        $buku = Buku::findOrFail($id); // Replace $id with the actual ID of the book to update



        // Update the book with the new values
        $buku->update($input);

        return redirect()->route('admin.buku.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Buku::findOrFail($id);
        $kategori->delete();

        return back()->with('succes', 'Data berhasil di hapus');
    }
}
