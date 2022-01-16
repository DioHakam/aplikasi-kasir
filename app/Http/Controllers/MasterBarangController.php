<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master_barang;

class MasterBarangController extends Controller
{
    public function index(){
        $barang = master_barang::all();

        return view('barang',[
            'barang' => $barang
        ]);
    }
}
