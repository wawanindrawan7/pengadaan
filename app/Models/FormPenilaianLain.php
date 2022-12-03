<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPenilaianLain extends Model
{
    use HasFactory;
    protected $table = 'form_penilaian_lain';
    public $timestamps = false;

    public function penilaianVendor()
    {
        return $this->belongsTo('App\Models\PenilaianVendor');
    }
}
