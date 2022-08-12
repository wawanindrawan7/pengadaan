<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaksanaan extends Model
{
    use HasFactory;
    protected $table = 'pelaksanaan';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function pelaksanaanFile()
    {
        return $this->hasMany(PelaksanaanFile::class);
    }

    public function penilaianVendor(){
        return $this->hasOne(PenilaianVendor::class);
    }
}
