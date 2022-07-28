<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;
    protected $table = 'pengadaan';
    public $timestamps = false;

    public function pengadaanFile()
    {
        return $this->hasMany(PengadaanFile::class);
    }

    public function perencanaan()
    {
        return $this->hasOne(Perencanaan::class);
    }

    public function pelaksanaan()
    {
        return $this->hasOne(Pelaksanaan::class);
    }


    public function amandemen()
    {
        return $this->hasOne(Amandemen::class);
    }




}
