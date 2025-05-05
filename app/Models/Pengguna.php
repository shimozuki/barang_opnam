<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{


    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'photo',
    ];
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
