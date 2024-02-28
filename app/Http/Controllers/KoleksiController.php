<?php

namespace App\Http\Controllers;

use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $koleksi = KoleksiPribadi::where('user_id', $user->id)->paginate(6);
        $title = "koleksi";
        return view('user.koleksi.index', compact('title', 'koleksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'buku_id' => 'required',
        ]);

        // Simpan ke koleksi
        $koleksi = new KoleksiPribadi;
        $koleksi->buku_id = $id;
        $koleksi->user_id = auth()->user()->id; // gunakan auth() untuk mendapatkan informasi pengguna yang sedang login
        $koleksi->save();

        return redirect()->route('peminjam.koleksi.index')->with('success', 'Data added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->delete();

        return redirect()->route('peminjam.koleksi.index')->with('success', 'Data delete successfully');
    }
}
