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

    public function usersReviewer()
    {
        return $this->hasMany(UsersReviewer::class);
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
        return $this->hasMany(Amandemen::class);
    }

    public function direksiPk()
    {
        return $this->hasOne(DireksiPk::class);
    }

    public function pengawasPk()
    {
        return $this->hasOne(PengawasPk::class);
    }

    public function pengawasK3()
    {
        return $this->hasOne(PengawasK3::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }




}
