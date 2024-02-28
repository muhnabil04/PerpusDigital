<?php

// app/Http/Controllers/PDFController.php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;
use PDF;
use App\Models\Buku;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $buku = peminjaman::all(); // Replace this with your actual data retrieval logic

        $pdf = PDF::loadView('pdf.buku', compact('buku'));

        return $pdf->download('riwayat_peminjaman.pdf');
    }
}
