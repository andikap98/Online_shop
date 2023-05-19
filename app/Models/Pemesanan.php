<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table='pemesanan';
    protected $fillable = ['kode_pemesanan','id_produk','id_customer','jumlah_beli','jumlah_harga','total_harga'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'id');
    }
}
