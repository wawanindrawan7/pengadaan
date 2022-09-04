<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    use HasFactory;
    protected $table = 'perencanaan';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perencanaanFile()
    {
        return $this->hasOne(PerencanaanFile::class);
    }

    public function hpeItem()
    {
        return $this->hasMany(HpeItem::class);
    }


}
