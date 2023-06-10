<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaanbeli extends Model
{
    use HasFactory;

    protected $table = "permintaanbeli";
    protected $fillable = ['idKaryawan','id_barang'];
    
public $timestamps=false;
}
