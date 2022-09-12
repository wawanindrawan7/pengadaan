<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kategori',
        'npwp',
        'no_wa',
        'alamat'
    ];


    public function penilaian_vendor()
    {
        return $this->hasMany('App\Models\PenilaianVendor');
    }
}
