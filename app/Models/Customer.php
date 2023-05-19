<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primarykey = 'id';
    protected $fillable = ['nama','email','telp','alamat'];

    public function pemesanan(){

        return $this->hasMany(Pemesanan::class, 'id_customer');
    }
}
