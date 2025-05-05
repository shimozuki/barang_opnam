<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Barangmasuk extends Model
{
    use Uuid;
    protected $table = 'barang_masuks';
    // protected $fillable = [
    //     'id','uud', 'barang_id', 'jml', 'stock', 'user_id','created_at','updated_at'
    // ];

    public function Barangmasuk()
    {
        return $this->hasMany(Barangmasuk::class);
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
