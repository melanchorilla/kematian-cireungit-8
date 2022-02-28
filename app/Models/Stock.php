<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'jumlah_barang', 'keterangan', 'user_id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
