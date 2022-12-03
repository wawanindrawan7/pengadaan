<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianVendor extends Model
{
    use HasFactory;
    protected $table = 'penilaian_vendor';
    public $timestamps = false;

    public function pelaksanaan()
    {
        return $this->belongsTo('App\Models\Pelaksanaan');
    }

    public function formPenilaian()
    {
        return $this->hasMany('App\Models\FormPenilaian');
    }
    public function formPenilaianLain()
    {
        return $this->hasMany('App\Models\FormPenilaianLain');
    }

    public function formKhs()
    {
        return $this->hasMany(FormKhs::class);
    }
}
