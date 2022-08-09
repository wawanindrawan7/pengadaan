<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireksiPk extends Model
{
    use HasFactory;

    protected $table = 'direksi_pk';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
}
