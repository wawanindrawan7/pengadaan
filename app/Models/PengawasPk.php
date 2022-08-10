<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengawasPk extends Model
{
    use HasFactory;

    protected $table = 'pengawas_pk';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
