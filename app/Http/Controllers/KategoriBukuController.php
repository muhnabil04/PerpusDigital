<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Models\kategori;



class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBuku::paginate(10);
        $title = 'kategori buku';
        return view('admin.kategori.index', compact('title', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'kategori buku';
        return view('admin.kategori.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $input['nama_kategori'] = $request->nama;

        KategoriBuku::create($input);
        return redirect()->route('admin.kategori.index')->with('success', 'data tersimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(KategoriBuku $kategoriBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'kategori buku';
        $kategori = KategoriBuku::findOrFail($id);
        return view('admin.kategori.edit', compact('title', 'kategori'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:255',

        ]);

        $kategori = KategoriBuku::findOrFail($id);
        $kategori->nama_kategori = $request->nama;

        $kategori->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Data tersimpan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->delete();

        return back()->with('succes', 'Data berhasil di hapus');
    }
}
