<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianVendor extends Model
{
    use HasFactory;
    protected $table = 'penilaian_vendor';
    public $timestamps = false;

    public function mitra()
    {
        return $this->belongsTo('App\Models\Mitra');
    }
}
