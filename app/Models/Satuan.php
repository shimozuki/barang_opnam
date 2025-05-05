<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $guarded = [];

    public function satuans()
    {
        return $this->hasMany(Satuan::class);
    }
}
