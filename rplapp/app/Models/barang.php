<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table="barang";
    protected $fillable = ['nama', 'stok','harga_beli','harga_jual'];
    public $timestamps = false;
}
