<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPenilaian extends Model
{
    use HasFactory;
    protected $table = 'form_penilaian';
    public $timestamps = false;

    public function penilaianVendor()
    {
        return $this->belongsTo('App\Models\PenilaianVendor');
    }
}
