@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Customer</title>
</head>
<h4>Daftar Data Customer</h4>
@if (session()->has('info'))
<div class="alert alert-success">
    {{ session()->get('info') }}
</div>
@endif
<div class="d-md-flex justify-content-md-end">
    <a href="{{ route('customer.create') }}" class="btn btn-primary mb-3">Tambah</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customer as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->noTelepon }}</td>
            <td>{{ $item->alamat }}</td>
            
            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                <td class="text-align-center">
                    <form action="{{ url('/customer/delete/'.$item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn fa-solid fa-trash-can"></button>
                    </form>
                    <a href="{{ url('/customer/edit/'.$item->id) }}" class="btn fa-solid fa-pen"></a>
                </td>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection