<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $table = 'usulan';
    public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
