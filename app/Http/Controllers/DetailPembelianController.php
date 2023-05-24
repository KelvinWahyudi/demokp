<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\detail_pembelian;

class DetailPembelianController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::find($id);
        return view("detailpembelian.index", compact('transaksi'));
    }

    public function create()
    {
        return view("detailpembelian.create");
    }

    public function store(Request $request, $id)
    {
        $customer = Customer::create([
            "nama" => $request->nama,
            "noTelepon" => $request->noTelp,
            "alamat" => $request->alamat 
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->idCustomer = $customer->id;
        $transaksi->save();

        $request->session()->flash("info", "Pembayaran telah berhasil dibayar!");
        return redirect()->route("home");
    }

    public function show(Request $request, $id)
    {
        $detailPembelian = detail_pembelian::find($id);
        return view("detailpembelian.view", compact("detailPembelian"));
    }

    public function edit(Request $request, $id)
    {
        $detailPembelian = detail_pembelian::find($id);
        return view("detailpembelian.edit", compact("detailPembelian"));
    }

    public function update(Request $request, $id)
    {
        $detailPembelian = detail_pembelian::find($id);
        $detailPembelian->nama = $request->nama;
        $detailPembelian->noTelepon = $request->noTelp;
        $detailPembelian->alamat = $request->alamat;
       $detailPembelian->save();
     
        $request->session()->flash("info", "Data pembelian $request->nama berhasil diganti!");
        return redirect()->route("detailpembelian.edit", [$id]);
    }

    public function destroy(Request $request, $id)
    {
        $detailPembelian = detail_pembelian::find($id);
        if ($detailPembelian) {
            $detailPembelian->delete();
        }
        
        $request->session()->flash("info", "Data pembelian berhasil dihapus!");
        return redirect()->route("detailpembelian.index");
    }
}