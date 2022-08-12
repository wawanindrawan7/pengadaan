<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKhs extends Model
{
    use HasFactory;
    protected $table = 'form_khs';
    public $timestamps = false;

    public function formKhsDetail()
    {
        return $this->hasMany(FormKhsDetail::class);
    }
}
