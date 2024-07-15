<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;
    protected $table = 'hewan';
    protected $fillable = [
        'jenis_hewan',
        'jenis_kelamin',
        'harga',
        'gambar',
        'status'
    ];

    // Relasi ke model Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
