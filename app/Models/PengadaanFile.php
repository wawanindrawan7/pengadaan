<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengadaanFile extends Model
{
    use HasFactory;
    protected $table = 'pengadaan_file';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
}
