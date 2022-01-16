<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembelianBarang;
use App\Models\master_barang;

class TransaksiPembelianBarangController extends Controller
{
    public function index(){

        $barang = master_barang::all();

        $transaksi = TransaksiPembelianBarang::with('master_barang')->whereNull('transaksi_pembelian_id')->get();
        return view('barang',[
            'barang' => $barang,
            'transaksi' => $transaksi
        ]);
    }

    public function store(Request $request){

        TransaksiPembelianBarang::create([
            'master_barang_id' => $request->jenis_barang,
            'jumlah' => $request->jumlah_barang,
            'harga_satuan' => $request->harga_satuan
        ]);

        return redirect('/');

    }

    public function show($id){

        $get = TransaksiPembelianBarang::with(['master_barang','transaksi_pembelian'])->where('transaksi_pembelian_id', $id)->get();

        return view('detail_transaksi', [
            'transaksi' => $get
        ]);

    }
}
