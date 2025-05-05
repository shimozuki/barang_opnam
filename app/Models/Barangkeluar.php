<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Barangkeluar extends Model
{
    use Uuid;
    protected $table = 'barang_keluars';

    public function Barankeluar()
    {
        return $this->hasMany(Barangkeluar::class);
    }
    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
