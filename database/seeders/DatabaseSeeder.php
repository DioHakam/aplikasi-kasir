<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\master_barang;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        master_barang::create([
            'nama_barang' => 'Sabun batang',
            'harga_satuan' => 3000,
        ]);
        master_barang::create([
            'nama_barang' => 'Mi Instan',
            'harga_satuan' => 2000,
        ]);
        master_barang::create([
            'nama_barang' => 'Pensil',
            'harga_satuan' => 1000,
        ]);
        master_barang::create([
            'nama_barang' => 'Kopi sachet',
            'harga_satuan' => 1500,
        ]);
        master_barang::create([
            'nama_barang' => 'Air minum galon',
            'harga_satuan' => 20000,
        ]);
    }
}
