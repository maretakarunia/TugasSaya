<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    use HasFactory;
    protected $primaryKey='idinventaris';
    protected $fillable=[
        'idinventaris',
        'nama',
        'kondisi',
        'keterangan',
        'jumlah',
        'idjenis',
        'tanggalregister',
        'idruang',
        'kodeinventaris',
        'idpetugas'
    ];
    public function petugas()
    {
        return $this->belongsTo(petugas::class);
    }  
}
