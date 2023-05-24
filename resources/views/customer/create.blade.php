@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Create Customer</title>
</head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4>Form Tambah Data Customer</h4>
            @if (session()->has('info'))
                <div class="alert alert-success">
                    {{ session()->get('info') }}
                </div>
            @endif
            <form action="{{ url('customer/store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection