<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amandemen extends Model
{
    use HasFactory;
    protected $table = 'amandemen';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function amandemenFile()
    {
        return $this->hasMany(AmandemenFile::class);
    }
}
