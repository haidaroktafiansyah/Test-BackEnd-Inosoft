<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'kendaraans';
    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga', 'stok', 'terjual', 'tipe_kendaraan', ' mesin', 'suspensi', 'kapasistas_penumpang', 'transmisi', 'tipe'
    ];
}
