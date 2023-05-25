<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\produk;
use App\Models\detail_pembelian;

class DetailPembelianController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::find($id);
        return view("detailpembelian.index", compact('transaksi'));
    }

    // public function index($id)
    // {
    //     $transaksi = Transaksi::find($id);
    
    //     if ($transaksi) {
    //         return view("detailpembelian.index", compact('transaksi'));
    //     } else {
    //         // Tambahkan penanganan jika data $transaksi tidak ditemukan
    //         return redirect()->route('transaksi.notfound');
    //     }
    // }
    

    public function create()
    {
        return view("detailpembelian.create");
    }

    public function store(Request $request)
    {
        // Ambil data dari form input
        $id = $request->input('id');
        $kdTransaksi = $request->input('kdTransaksi');
        $product_id = $request->input('product_id');
        $jml_pembelian = $request->input('jml_pembelian');
        $purchase_amount = $request->input('purchase_amount');

        // Simpan data ke database
        $detailPembelian = new detail_pembelian();
        $detailPembelian->id = $id;
        $detailPembelian->kdTransaksi = $kdTransaksi;
        $detailPembelian->product_id = $product_id;
        $detailPembelian->jml_pembelian = $jml_pembelian;
        $detailPembelian->purchase_amount = $purchase_amount;
        $detailPembelian->save();

        return redirect()->route('detailpembelian.index')->with('success', 'Detail Pembelian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $detailPembelian = detail_pembelian::find($id);
        return view("detailpembelian.edit", compact('detailPembelian'));
    }

    public function update(Request $request, $id)
    {
        // Ambil data dari form input
        $kdTransaksi = $request->input('kdTransaksi');
        $product_id = $request->input('product_id');
        $jml_pembelian = $request->input('jml_pembelian');
        $purchase_amount = $request->input('purchase_amount');

        // Cari data detail pembelian berdasarkan ID
        $detailPembelian = detail_pembelian::find($id);

        // Update data detail pembelian
        $detailPembelian->kdTransaksi = $kdTransaksi;
        $detailPembelian->product_id = $product_id;
        $detailPembelian->jml_pembelian = $jml_pembelian;
        $detailPembelian->purchase_amount = $purchase_amount;
        $detailPembelian->save();

        return redirect()->route('detailpembelian.index')->with('success', 'Detail Pembelian berhasil diperbarui.');
    }

    public function delete($id)
    {
        $detailPembelian = detail_pembelian::find($id);
        $detailPembelian->delete();

        return redirect()->route('detailpembelian.index')->with('success', 'Detail Pembelian berhasil dihapus.');
    }
}
   

    // public function store(Request $request, $id)
    // {
    //     $customer = Customer::create([
    //         "nama" => $request->nama,
    //         "noTelepon" => $request->noTelp,
    //         "alamat" => $request->alamat 
    //     ]);

    //     $transaksi = Transaksi::find($id);
    //     $transaksi->idCustomer = $customer->id;
    //     $transaksi->save();

    //     $request->session()->flash("info", "Pembayaran telah berhasil dibayar!");
    //     return redirect()->route("home");
    // }

    // public function show(Request $request, $id)
    // {
    //     $detailPembelian = detail_pembelian::find($id);
    //     return view("detailpembelian.view", compact("detailPembelian"));
    // }

    // public function edit(Request $request, $id)
    // {
    //     $detailPembelian = detail_pembelian::find($id);
    //     return view("detailpembelian.edit", compact("detailPembelian"));
    // }

    // public function update(Request $request, $id)
    // {
    //     $detailPembelian = detail_pembelian::find($id);
    //     $detailPembelian->nama = $request->nama;
    //     $detailPembelian->noTelepon = $request->noTelp;
    //     $detailPembelian->alamat = $request->alamat;
    //    $detailPembelian->save();
     
    //     $request->session()->flash("info", "Data pembelian $request->nama berhasil diganti!");
    //     return redirect()->route("detailpembelian.edit", [$id]);
    // }

    // public function destroy(Request $request, $id)
    // {
    //     $detailPembelian = detail_pembelian::find($id);
    //     if ($detailPembelian) {
    //         $detailPembelian->delete();
    //     }
        
    //     $request->session()->flash("info", "Data pembelian berhasil dihapus!");
    //     return redirect()->route("detailpembelian.index");
    // }