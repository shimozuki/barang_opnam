<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Barang extends Model
{
    use Uuid;
    protected $guarded = [];

    public function Satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Barang()
    {
        return $this->hasMany(Barang::class);
    }


}
