<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idpeminjaman';

    protected $fillable = [
        'idinventaris',
        'jumlah',
        'jumlahkembali',
        'tanggalpeminjaman',
        'tanggalkembali',
        'idpegawai'
    ];

    public function inventaris()
    {
        return $this->belongsTo(inventaris::class, 'id_inventaris');
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai');
    }

    public function jenis()
    {
        return $this->belongsTo(jenis::class, 'id_jenis');
    }
}
