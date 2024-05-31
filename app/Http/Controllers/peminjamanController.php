<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\pegawai;
use App\Models\peminjaman as p;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris','peminjamen.idinventaris','=','inventaris.idinventaris')
        ->select('peminjamen.*', 'inventaris.nama')
        ->get();

        return view('peminjaman.list', compact('data'));
    }

    public function p_index()
    {
        $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
        ->select('peminjamen.*', 'inventaris.nama')
        ->whereNull('peminjamen.tanggalpeminjaman')
        ->whereNull('peminjamen.tanggalkembali')
        ->get();

        return view('peminjaman.tampil', compact('data'));
    }

    public function k_index()
    {
        $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
        ->select('peminjamen.*', 'inventaris.nama')
        ->whereNotNull('peminjamen.tanggalpeminjaman')
        ->whereNull('peminjamen.tanggalkembali')
        ->where('peminjamen.statuspeminjaman', 'Proses kembali')
        ->get();

        return view('pengembalian.tampil', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjaman = Peminjaman::all();
        $inventaris = inventaris::all();
        $pegawai = pegawai::all();
        $jumlah = 1;
        $idinventaris = request('idinventaris');
        $idpegawai = request('idpegawai');
        $i_detail = inventaris::find($idpegawai);
        $p_detail = pegawai::find($idpegawai);
        $act = request('act');
        $jumlah = request('jumlah');
        if($act == 'min'){
            if ($jumlah <= 1){
                $jumlah = 1;
            } else {
                $jumlah = $jumlah - 1;
            }
        } else {
            $jumlah = $jumlah + 1;
        } 

        $data = $inventaris->map(function ($item){
            return [
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama,
            ];
        });

        $datap = $pegawai->map(function ($item){
            return [
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai,
            ];
        });

        return view('peminjaman.input', compact('i_detail','p_detail','data','datap','jumlah','peminjaman'));
    }    

    protected function addpeminjaman(){
        $data = [
            'idinventaris' => auth()->user()->id,
            'nama' => auth()->user()->nama,
        ];

        p::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idinventaris'=> 'required',
            'jumlah' => 'required',
            'statuspeminjaman' => 'required',
            'idpegawai' => 'required'
        ]);

        p::create([
            'idinventaris' => $request->idinventaris,
            'jumlah' => $request->jumlah,
            'statuspeminjaman' => $request->statuspeminjaman,
            'idpegawai' => $request->idpegawai
        ]);

        return Redirect::to('/peminjaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('peminjamen')->where('idpeminjaman', $id)->get();
        $peminjaman = Peminjaman::find($id); 
        $inventaris = Inventaris::all();
        $detail_inventaris = $inventaris->map(function($item){
            return[
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama
            ];
        });
        $pegawai = Pegawai::all();
        $detail_pegawai = $pegawai->map(function($item){
            return[
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai
            ];
        });
        
        return view("peminjaman.show",['peminjamen' => $data], compact( 'detail_inventaris','detail_pegawai', 'data','peminjaman','inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('peminjamen')->where('idpeminjaman', $id)->get();
        $peminjaman = peminjaman::find($id);
        $inventaris = inventaris::all();
        $detail_inventaris = $inventaris->map(function($item){
            return[
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama
            ];
        });
        $pegawai = pegawai::all();
        $detail_pegawai = $pegawai->map(function($item){
            return[
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai
            ];
        });

        return view("peminjaman.edit", ['peminjamen' => $data], compact('detail_inventaris','detail_pegawai','data','peminjaman','inventaris'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('peminjamen')->where('idpeminjaman',$request->idpeminjaman)->update([
            'idinventaris' => $request->idinventaris,
            'idpegawai' => $request->idpegawai,
            'jumlah' => $request->jumlah,
            'tanggalpeminjaman' => $request->tanggalpeminjaman,
            'tanggalkembali' => $request->tanggalkembali,
            'statuspeminjaman' => $request->statuspeminjaman
        ]);
        return redirect('/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('peminjamen')->where('idpeminjaman', $id)->delete();
        return redirect('/peminjaman');
    }

    public function allowPeminjaman($id)
    {
        $peminjaman = peminjaman::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Dipinjam';
        $peminjaman->tanggalpeminjaman = now()->toDateTimeString();
        $peminjaman->save();

        return redirect()->back()->with('success', 'status peminjaman berhasil diubah menjadi dipinjam');
    }
    
    public function allowProsesPengembalian($id)
    {
        $peminjaman = peminjaman::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Proses kembali';
        $peminjaman->save();

        return redirect()->back()->with('success', 'status peminjaman berhasil diubah menjadi ProsesKembali');
    }

    public function allowPengembalian($id)
    {
        $peminjaman = peminjaman::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditentukan');
        }
        $peminjaman->statuspeminjaman = 'Dikembalikan';
        $peminjaman->tanggalkembali = now()->toDateTimeString();
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi dikembalikan');
    }
    
    public function TolakPengembalian($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data pengembalian tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Pengembalian Ditolak';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Pengembalian Ditolak');
    }

    public function TolakPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Peminjaman Ditolak';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Peminajaman Ditolak');
    }
}
