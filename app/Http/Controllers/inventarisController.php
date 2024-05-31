<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Petugas;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventaris::with('petugas')->get();$data = DB::table('inventaris')
        ->join('petugas', 'inventaris.idpetugas', '=', 'petugas.idpetugas')
        ->select('inventaris.*', 'petugas.namapetugas')
        ->get();

        return view('inventaris.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = Petugas::all();
        $ruang = Ruang::all();
        $jenis = Jenis::all();
        return view('inventaris.input', compact('petugas','ruang','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validate the request data
    $request->validate([
        'nama' => 'required',
        'kondisi' => 'required',
        'keterangan' => 'required',
        'jumlah' => 'required|numeric',
        'idjenis' => 'required',
        'tanggalregister' => 'required|date',
        'idruang' => 'required',
        'kodeinventaris' => 'required',
        'idpetugas' => 'required' 
    ]);

    // Insert the record into the database
    Inventaris::create([
        'nama' => $request->nama,
        'kondisi' => $request->kondisi,
        'keterangan' => $request->keterangan,
        'jumlah' => $request->jumlah,
        'idjenis' => $request->idjenis,
        'tanggalregister' => $request->tanggalregister,
        'idruang' => $request->idruang,
        'kodeinventaris' => $request->kodeinventaris,
        'idpetugas' => $request->idpetugas
    ]);

    // Redirect back after successful creation
    return redirect('/inventaris')->with('success', 'Inventaris created successfully.');
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



        // Mulai dari sini kebawah




        public function edit(string $id)
        {
            $inventaris = Inventaris::find($id);
            $jenis = Jenis::all(); 
            $ruang = Ruang::all();
            $petugas = Petugas::all();
            
                if (!$inventaris) {
                    return redirect()->back()->with('error', 'Inventaris not found.');
                }
            
            return view("inventaris.edit", compact('inventaris', 'jenis', 'ruang','petugas')); 
        }
            
    
        public function update(Request $request)
        {
            DB::table('inventaris')->where('idinventaris',$request->idinventaris)->update([
                'nama' => $request->nama,
                'kondisi' => $request->kondisi,
                'keterangan' => $request->keterangan,
                'jumlah' => $request->jumlah,
                'idjenis' => $request->idjenis,
                'tanggalregister' => $request->tanggalregister,
                'idruang' => $request->idruang,
                'kodeinventaris' => $request->kodeinventaris,
                'idpetugas' => $request->idpetugas
            ]);
    
            return redirect('/inventaris');
        }
    public function destroy(string $id)
    {
        DB::table('inventaris')->where('idinventaris',$id)->delete();
        return redirect('/inventaris');
    }
}