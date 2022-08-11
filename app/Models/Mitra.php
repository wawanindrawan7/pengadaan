<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    public $timestamps = false;

    public function penilaian_vendor()
    {
        return $this->hasMany('App\Models\PenilaianVendor');
    }
}
