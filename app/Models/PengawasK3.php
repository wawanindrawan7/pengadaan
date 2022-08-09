<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengawasK3 extends Model
{
    use HasFactory;

    protected $table = 'pengawas_k3';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
}
