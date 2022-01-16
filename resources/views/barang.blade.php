@extends('layout.main')

@section('container')
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-12">
            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#tambahbarang">+ Tambahkan Pembelian Barang</button>
        </div>
    </div>

    <form action="/bayar" method="post">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>

                @php $total = 0; @endphp
                @foreach ($transaksi as $key=> $t)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $t->master_barang->nama_barang }}</td>
                    <td>{{ $t->jumlah }}</td>
                    <td>Rp.{{ $t->harga_satuan }}</td>
                    @php
                    $subtotal = $t->harga_satuan * $t->jumlah;
                    $total += $subtotal;
                    @endphp
                    <td class="subtotal">Rp.{{ $subtotal  }}</td>
                </tr>
                <input type="hidden" name="transaksi_barang_id[{{ $key }}]" value="{{ $t->id }}">
                @endforeach
                <input type="hidden" name="total_harga" value="{{ $total }}">
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><b class="text-center">Total</b> </td>
                    <td><b>Rp{{ $total }}</b></td>
                </tr>
            </tfoot>
        </table>
        @if(isset($transaksi[0]))
        <div class="row">
            <button class="btn btn-block btn-primary">Simpan & Bayar</button>
        </div>
        @endif
    </form>
    <div class="modal fade" id="tambahbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menambahkan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/simpan_transaksi">
                    @csrf
                    <input type="hidden" id="harga_satuan_form" name="harga_satuan" value="1">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Jenis Barang</label><select class="form-select" id="jenis_barang" name="jenis_barang" aria-label="Default select example">
                                        <option selected>Pilih Jenis Barang</option>@foreach ($barang as $b)<option data-price="{{ $b->harga_satuan }}" value="{{ $b->id }}">{{ $b->nama_barang }}</option> @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3"><label for="jumlah_barang" class="form-label">Jumlah Barang</label><input type="number" min="1" class="form-control" id="jumlah_barang" name="jumlah_barang" value="1"></div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3"><label for="Subtotal" class="form-label">Subtotal</label><input type="number" onchange="getJumlah" class="form-control" disabled id="subtotal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    $('#jumlah_barang').change(function() {
        let jumlah = $(this).val();
        let harga_satuan = $('#jenis_barang').find(':selected').attr('data-price');
        let subtotal = jumlah * harga_satuan;
        $('#subtotal').val(subtotal);
        $('#harga_satuan_form').val(harga_satuan);
        console.log(harga_satuan);
    });
    $('#jenis_barang').change(function() {
        let jumlah = $('#jumlah_barang').val();
        let harga_satuan = $(this).find(':selected').attr('data-price');
        let subtotal = jumlah * harga_satuan;
        $('#subtotal').val(subtotal);
        $('#harga_satuan_form').val(harga_satuan);

        console.log(harga_satuan);
    });

</script>
@endsection
