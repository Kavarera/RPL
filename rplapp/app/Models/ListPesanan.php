<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPesanan extends Model
{
    use HasFactory;
    protected $table = "ListPesanan";
    protected $fillable = ['status','nama_barang','stok','nama_pembeli','kontak_pembeli',
    'no_hp_pembeli','alamat_pembeli'
];
public $timestamps = false;
}
