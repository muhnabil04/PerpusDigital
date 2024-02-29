<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\UlasanBuku;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = buku::paginate(6);
        $title = "peminjaman";
        return view('user.peminjam.index', compact('title', 'buku'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $title = "peminjaman";
        $buku = buku::where('judul', 'like', "%" . $cari . "%")->orWhere('penerbit', 'like', "%" . $cari . "%")->orWhere('penerbit', 'like', "%" . $cari . "%")->orWhere('TahunTerbit', 'like', "%" . $cari . "%")->paginate(6);
        return view('user.peminjam.index', compact('title', 'buku'));
    }


    public function riwayatPeminjaman()
    {

        $user = Auth::user();
        $buku = Peminjaman::paginate(6);

        $title = "peminjaman";
        return view('admin.riwayat.index', compact('title', 'buku'));
    }

    public function peminjaman()
    {

        $user = Auth::user();
        $buku = Peminjaman::where('user_id', $user->id)->paginate(6);

        $title = "peminjaman";
        return view('user.peminjam.pinjaman', compact('title', 'buku'));
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
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|max:255',
            'buku_id' => 'required|max:255',
        ]);

        $input['user_id'] = $request->user_id;
        $input['buku_id'] = $request->buku_id;
        $input['tanggal_peminjaman'] = Carbon::now()->format('Y-m-d');
        $input['tanggal_pengembalian'] = Carbon::now()->format('Y-m-d');

        $input['status_peminjaman'] = 'dipinjam';


        // Assuming you have retrieved the book to update (e.g., using find())
        $peminjaman = peminjaman::create($input);

        return redirect()->route('peminjam.buku.index')->with('success', 'Data add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        $title = "Buku";
        $ulasan = UlasanBuku::where('buku_id', $buku->id)->paginate(6);
        return view('user.peminjam.detail_buku', compact('title', 'buku', 'ulasan'));
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

        $request->validate([
            'user_id' => 'required|max:255',
            'buku_id' => 'required|max:255',
            'tanggal_peminjaman' => 'required',
        ]);



        $input['tanggal_peminjaman'] = $request->tanggal_peminjaman;
        $input['tanggal_pengembalian'] = Carbon::now()->format('Y-m-d');

        $input['status_peminjaman'] = 'dikembalikan';


        // Assuming you have retrieved the book to update (e.g., using find())
        $peminjaman = Peminjaman::findOrFail($id);



        // Update the book with the new values
        $peminjaman->update($input);

        return redirect()->route('peminjam.buku.index')->with('success', 'Data updated successfully');
    }

    public function ulasan(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|max:255',
            'rating' => 'required|max:255',
            'ulasan' => 'required|max:255',
        ]);

        $user_id = Auth::user()->id;

        $input = [
            'user_id' => $user_id,
            'buku_id' => $request->buku_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan, // Fix: use $request->ulasan instead of $request->rating
        ];

        // Assuming you have retrieved the book to update (e.g., using find())
        $ulasan = UlasanBuku::create($input);

        return redirect()->route('peminjam.buku.index')->with('success', 'Data added successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
