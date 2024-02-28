<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Charts\BukuChart;
use App\Models\User;

class DashboardController extends Controller
{

    public function index(BukuChart $chart)
    {
        $userCount = User::count();
        $bookCount = Buku::count();
        $kategoriCount = KategoriBuku::count();
        $data['chart'] = $chart->build();
        $data['userCount'] = $userCount;
        $data['bookCount'] = $bookCount;
        $data['kategoriCount'] = $kategoriCount;

        return view('dashboard', $data);
    }


    /**
     * Display a listing of the resource.
     */

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
        //
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
    }
}
