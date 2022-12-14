<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HpeItem extends Model
{
    use HasFactory;

    protected $table = 'hpe_item';
    public $timestamps = false;

    public function perencanaan()
    {
        return $this->belongsTo(Perencanaan::class);
    }
}
