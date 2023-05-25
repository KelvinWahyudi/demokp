@extends('layouts.main')

@section('container')
     <!-- <div class="container  mb-5">
        <div class="row mt-5">
            <div class="col-md-6">
                <form action="{{ url('payments/store/'.$transaksi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <thead>
                            <h3 style="color: black;">Menu Pembayaran</h3>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="mb-3 form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama" required autofocus>
                                        @error('nama')
                                            <div class="text-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="noTelp">Nomor Telepon</label>
                                        <input type="text" id="noTelp" class="form-control" name="noTelp" required autofocus>
                                        @error('noTelp')
                                            <div class="text-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" class="form-control" name="alamat" required autofocus>
                                        @error('alamat')
                                            <div class="text-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            
            <div class="col-md-6">
                <table class="table mt-3 py-5">
                    <tbody>
                        <tr>
                            <td>
                                <div class="mb-3 form-group">
                                    <label for="payment">Jenis Pembayaran</label>
                                    <select id="payment" name="jenisPembayaran" class="form-control" required>
                                        <option>Transfer</option>
                                    </select>
                                    @error('payment')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="buktiTransfer">Bukti Transfer</label>
                                    <input type="file" id="buktiTransfer" class="form-control" name="buktiTransfer" required>
                                    @error('buktiTransfer')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4 style="color: black;">Tata Cara Transfer:</h4>
                <ol>
                    <li style="color: black;">Transfer ke nomor rekening 9999999 (BANK ?)</li>
                    <li style="color: black;">Cantumkan nama Anda pada deskripsi transfer</li>
                    <li style="color: black;">Pastikan jumlah transfer sesuai dengan total pembayaran</li>
                </ol>
                <button type="submit" class="btn btn-primary" formtarget="_blank">
                    <i class="fa-solid fa-cart-shopping"></i> Bayar
                </button>
                </form>
            </div>
        </div> -->

        <!-- detailpembelian/index.blade.php -->

        <div class="row">
        <div class="col">
            <h4><strong>Detail Pembelian</strong></h4>
            <div class="table-responsive mt-3">
            <table class="table">
                <thead>
            <tr>
                <th style="width:50%">Produk</th>
                <th style="width:10%">Jumlah</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transaksi->detailPembelian as $detail)
                        <tr data-id="{{ $detail->id}}">
                            <td>
                                <div class="row">
                                <img src="{{ asset('storage/'.$detail->produk->foto) }}" width="100" height="100" class="img-responsive"/>
                                </div>

                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $detail->produk->nama }}</h4>
                                    </div>
                                   </div>
                            </td>
                            <td data-th="Price">{{ $detail->jml_pembelian }}</td>
                             <td data-th="Subtotal" class="text-center">${{  $detail->purchase_amount }}</td>
                            
                        </tr>
                        @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>Total Rp{{  $detail->purchase_amount }}</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/produks') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <a class="btn btn-success" href="{{ url('/tes') }}">Checkout</a>
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div> 


        <!-- <h1>Detail Pembelian</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Product ID</th>
                    <th>Jumlah Pembelian</th>
                    <th>Amount</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detailPembelian as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <!-- <td>
            <img src="{{ asset('storage/'.$detail->produk->foto) }}" alt="Foto Produk">
        </td> -->
                        <td>{{ $detail->produk->nama }}</td>
                        <td>{{ $detail->jml_pembelian }}</td>
                        <td>{{ $detail->purchase_amount }}</td>
                        {{-- <td>
                            <a href="{{ route('detailpembelian.edit', $detail->id) }}">Edit</a>
                            <form action="{{ route('detailpembelian.delete', $detail->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus detail pembelian ini?')">Hapus</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table> -->

<!-- {{-- <a href="{{ route('detailpembelian.create') }}">Add Detail Pembelian</a> --}} -->

        
    <!-- </div> -->
@endsection
