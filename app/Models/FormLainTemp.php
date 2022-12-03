<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLainTemp extends Model
{
    use HasFactory;
    protected $table = 'form_lain_temp';
    public $timestamps = false;

    public function pelaksanaan()
    {
        return $this->belongsTo(Pelaksanaan::class);
    }
}
