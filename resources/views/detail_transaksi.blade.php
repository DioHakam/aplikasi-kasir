@extends('layout.main')

@section('container')
<div class="container my-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="/daftar_transaksi" class="btn btn-outline-secondary">
                < Back</a>
        </div>
    </div>
    <h4>Detail Transaksi pada: <u> {{ date_format($transaksi[0]->transaksi_pembelian->created_at, "D, M Y H:i:s") }}</u></h4>
    <table class="table mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Barang Dibeli</th>
                <th>Harga Satuan</th>
                <th>Subtotal Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
            <tr>
               <td>{{ $t->master_barang->nama_barang }}</td>
               <td>{{ $t->jumlah }}</td>
               <td>Rp.{{ $t->harga_satuan }}</td>
               <td>Rp.{{ $t->harga_satuan * $t->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><b class="text-center">Total</b> </td>
                <td><b> Rp.{{ $transaksi[0]->transaksi_pembelian->total_harga }}</b></td>

            </tr>
        </tfoot>
    </table>
</div>
@endsection

