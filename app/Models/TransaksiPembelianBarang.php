<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembelian_barang';

    protected $guarded = ['id'];

    public function master_barang(){

        return $this->belongsTo(master_barang::class);
    }
    public function transaksi_pembelian(){

        return $this->belongsTo(TransaksiPembelian::class);
    }
}
