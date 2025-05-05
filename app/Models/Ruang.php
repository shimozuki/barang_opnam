<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $guarded = [];

    public function ruangs()
    {
        return $this->hasMany(Ruang::class);
    }
}
