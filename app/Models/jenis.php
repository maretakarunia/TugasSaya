<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    use HasFactory;
    protected $primaryKey='idjenis';
    protected $fillable=[
        'namajenis',
        'kodejenis',
        'keterangan'
    ];
}
