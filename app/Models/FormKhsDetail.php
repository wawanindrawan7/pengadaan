<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKhsDetail extends Model
{
    use HasFactory;
    protected $table = 'form_khs_detail';
    public $timestamps = false;

    public function formKhs()
    {
        return $this->belongsTo('App\Models\FormKhs');
    }
}
