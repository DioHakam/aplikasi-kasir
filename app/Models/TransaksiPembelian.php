<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembelian';

    protected $guarded = ['id'];


    public function transaksi_pembelian_barang(){
        return $this->hasMany(TransaksiPembelianBarang::class);
    }
}
