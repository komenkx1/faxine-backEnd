<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';
    // protected $guarded = ["id"];
    protected $fillable = [
        'id',
        'nama_masyarakat',
        'alamat',
        'status',
        'link_google_map',
        'tanggal_mulai',
        'tanggal_berakhir',
        'kapasitas',
    ];
}
