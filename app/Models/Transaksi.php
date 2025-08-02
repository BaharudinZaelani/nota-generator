<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pelanggan', 'tanggal', 'items', 'total'];
    protected $casts = [
        'items' => 'array',
    ];
}