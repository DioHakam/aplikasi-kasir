<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_barang extends Model
{
    use HasFactory;

    protected $table = 'master_barang';

    protected $guarded = ['id'];

    public function transaksipembelianbarang()
    {
        return $this->hasMany(TransakasiPembelianBarang::class);
    }
}
