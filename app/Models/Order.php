<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'users_id',
        'hewan_id',
        'alamat',
        'pembayaran',
        'total_harga',
    ];

    // Relasi ke model User
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Hewan
    public function hewan()
    {
        return $this->belongsTo(Hewan::class);
    }
}
