@extends('layouts.main')

@section('container')
    <div class="container  mb-5">
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
            
        </div>
    </div>
@endsection
