<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksi extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama_koleksi',
        'deskripsi',
        'tanggal_ditambahkan',
        'asal',
        'kondisi'
    ];
}
