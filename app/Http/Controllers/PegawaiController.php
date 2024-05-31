<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pegawai::all();
        return view('pegawai.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = pegawai::all();
        return view('pegawai.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pegawais')->insert([
            'namapegawai'=> $request-> namapegawai,
            'nip' => $request-> nip,
            'alamat' => $request -> alamat 
        ]);

        return redirect('/pegawai');
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
        $data = pegawai::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Inventaris not found.');
        }
        return view("pegawai.edit", compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('pegawais')->where('idpegawai', $request->idpegawai)->update([
            'namapegawai' => $request->namapegawai,
            'nip' => $request->nip,
            'alamat' => $request->alamat, 
        ]);
    
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pegawais')->where('idpegawai',$id)->delete();
        return redirect('/pegawai');
    }
}
