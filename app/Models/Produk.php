<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primarykey = 'id';
    protected $fillable = ['nama_produk','harga_produk','stok','deskripsi','foto_produk']; 

    public function pemesanan() {
        return $this->hasMany(Pemesanan::class);
    }
}
