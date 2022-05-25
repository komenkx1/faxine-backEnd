<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_masyarakat',
        'alamat',
        'status',
        'form_link_google_map',
        'tanggal_mulai',
        'tanggal_selesai',
        'kapasitas',
    ];
}
