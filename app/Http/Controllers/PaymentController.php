<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class PaymentController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::find($id);
        return view("detailpembelian.index", compact('transaksi'));
    }

    public function create()
    {
        return view('detailpembelian.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'noTelp' => 'required',
    //         'alamat' => 'required',
    //         'payment' => 'required',
    //         'buktiTransfer' => 'required',
    //     ]);
    //     $payment = new Payment();
    //     dd($payment);

    //     $payment->nama = $request->input('nama');
    //     $payment->noTelp = $request->input('noTelp');
    //     $payment->alamat = $request->input('alamat');
    //     $payment->jenisPembayaran = $request->input('jenisPembayaran');
    //     $payment->buktiTransfer = $request->input('buktiTransfer');
    //     $payment->save();

    //     // return redirect()->route('payments.store')->with('success', 'Payment created successfully.');
    //     return redirect()->route('detailpembelian.index')->with('success', 'Payment created successfully.');

    // }
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'noTelp' => 'required',
            'alamat' => 'required',
            'jenisPembayaran' => 'required',
            'buktiTransfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'status' => 'required',
        ]);

        // Mengunggah file gambar bukti transfer
        if ($request->hasFile('buktiTransfer')) {
            $file = $request->file('buktiTransfer');
            $nama_file = 'buktiTransfer-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $nama_file);
        }
        $statusOptions = ['Diproses', 'Dikirim', 'Ditolak', 'Selesai'];

        $payment = new Payment();
        $payment->transaction_id = $id;
        $payment->user_id = auth()->user()->id;
        // $payment->user_id = $request->auth()->user()->id;
        $payment->nama = $request->input('nama');
        $payment->noTelp = $request->input('noTelp');
        $payment->alamat = $request->input('alamat');
        $payment->jenisPembayaran = $request->input('jenisPembayaran');
        $payment->buktiTransfer = $nama_file;
        $payment->status = $request->input('status', $statusOptions[0]); // Menggunakan 'Diproses' sebagai default
        $payment->save();
        // dd($payment);
        return redirect()->route('pembayaran.index')->with('success', 'Payment created successfully.');
        // return view('detailpembelian.index', compact('transaksi', 'payment'))->with('success', 'Payment created successfully.');
    }



    public function edit($id)
{
    $statusOptions = ['Diproses', 'Dikirim', 'Ditolak', 'Selesai'];
    $payment = Payment::findOrFail($id);

    return view('edit', compact('payment', 'statusOptions'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'noTelp' => 'required',
        'alamat' => 'required',
        'jenisPembayaran' => 'required',
        'buktiTransfer' => 'required',
        'status' => 'required',
    ]);

    $statusOptions = ['Diproses', 'Dikirim', 'Ditolak', 'Selesai'];

    $payment = Payment::findOrFail($id);
    $payment->nama = $request->input('nama');
    $payment->noTelp = $request->input('noTelp');
    $payment->alamat = $request->input('alamat');
    $payment->jenisPembayaran = $request->input('jenisPembayaran');
    $payment->buktiTransfer = $request->input('buktiTransfer');
    $payment->status = $request->input('status', $statusOptions[0]);
    $payment->save();

    return redirect()->route('edit', ['id' => $id])->with('success', 'Payment updated successfully.');
}


    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('detailpembelian.index')->with('success', 'Payment deleted successfully.');
    }

    public function pembayaran_index()
    {
        $userId = auth()->user()->id;

        $emailLogin = auth()->user()->email;
        // dd($emailLogin);
        if ($emailLogin == 'kelvin@admin.com' || $emailLogin == 'stephen@admin.com') {
            $payment = payment::leftJoin('users', 'users.id', '=', 'payments.user_id')
                ->select('payments.*', 'users.name as user_name')
                ->get();
        } else {

            $payment = payment::leftJoin('users', 'users.id', '=', 'payments.user_id')
                ->where('users.id', $userId)
                ->select('payments.*', 'users.name as user_name')
                ->get();
        }
        // dd($payment);
        return view("pembayaran", compact('payment'));
    }
}