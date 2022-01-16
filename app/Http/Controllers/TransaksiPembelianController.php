<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembelian;
use App\Models\TransaksiPembelianBarang;

class TransaksiPembelianController extends Controller
{
    public function store(Request $request){

        $insert = TransaksiPembelian::create([
            'total_harga' => $request->total_harga
        ]);

       
        if(isset($request->transaksi_barang_id)){

            foreach($request->transaksi_barang_id as $tb){

                $update = TransaksiPembelianBarang::find($tb);

                $update->transaksi_pembelian_id = $insert->id;

                $update->save();
            }
        }


        return redirect('/');
    }

    public function all_transaction(){

        $transaksi = TransaksiPembelian::orderBy('created_at')->get();

        return view('semua_transaksi', [
            'transaksi'=>$transaksi
        ]);
    }
}
