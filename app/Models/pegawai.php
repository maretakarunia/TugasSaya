<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $primaryKey='idpegawai';
    protected $fillable=[
        'namapegawai',
        'nip',
        'alamat'
    ];

    public function peminjaman(){
        return $this->belongsTo(peminjaman::class);
    }
}
