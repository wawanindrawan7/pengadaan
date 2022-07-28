<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmandemenFile extends Model
{
    use HasFactory;
    protected $table = 'amandemen_file';
    public $timestamps = false;

    public function amandemen()
    {
        return $this->belongsTo(Amandemen::class);
    }
}
