<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Petugas::with('Level')->get();$data = DB::table('Petugas')
        ->join('levels', 'petugas.idlevel', '=', 'levels.idlevel')
        ->select('petugas.*', 'levels.namalevel')
        ->get();
        return view('petugas.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $level = Level::all();
        $data  = $level->map(function($item){
            return[
                'idlevel' => $item->idlevel,
                'namalevel' =>$item->namalevel
            ];
        });

        return view('petugas.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('petugas')->insert([
            'namapetugas' => $request->namapetugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'idlevel' =>$request->idlevel
        ]);

        return redirect('/petugas');
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
        $data = DB::table('petugas')->where('idpetugas', $id)->get();
        $level = level::all();
        $detail_level = $level->map(function($item){
            return[
                'idlevel' => $item->idlevel,
                'namalevel' => $item->namalevel
            ];
        });
        return view("petugas.edit",['petugas' => $data], compact( 'detail_level'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('petugas')->where('idpetugas',$request->idpetugas)->update([
            'namapetugas' => $request->namapetugas,
            'username' => $request->username,
            'idlevel' => $request->idlevel,
        ]);

        return redirect('/petugas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('petugas')->where('idpetugas', $id)->delete();
        return redirect('/petugas');
    }
}
