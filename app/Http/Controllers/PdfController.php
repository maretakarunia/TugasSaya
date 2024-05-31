<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function generatepdfPeminjaman()
     {
          $peminjaman = Peminjaman::with('inventaris')->get();$peminjaman = DB::table('peminjamen')
          ->join('inventaris', 'peminjamen.idinventaris','=','inventaris.idinventaris')
          ->select('peminjamen.*','inventaris.nama')
          ->get();
          $data = [
             'title' => 'Laporan Data Peminjaman',
             'peminjaman' => $peminjaman
          ];
          $pdf = Pdf::loadView('/peminjaman/pdf', $data);
          return $pdf->download('PeminjamanPDF.pdf');
     }

    /**
     * Show the form for creating a new resource.
     */

     

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
