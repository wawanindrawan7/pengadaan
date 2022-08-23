<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersReviewer extends Model
{
    use HasFactory;

    protected $table = 'users_reviewer';
    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
