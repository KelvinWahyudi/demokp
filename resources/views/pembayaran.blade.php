<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawang Agung Sukses - Tambah Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://unpkg.com/feather-icons"></script>
</head>
    
    @include('navbar.navbar')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>    


<section class="py-5 mt-5">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <h1>Payment Details</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Penerima</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Jenis Pembayaran</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
                            <th>
                                @php
                                $emailLogin = auth()->user()->email;
                            @endphp
                             @if ($emailLogin == 'kelvin@admin.com' || $emailLogin == 'stephen@admin.com')
                                Actions
                                @endif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->user_name}}</td>
                                <td>{{ $payment->nama }}</td>
                                <td>{{ $payment->noTelp }}</td>
                                <td>{{ $payment->alamat }}</td>
                                <td>{{ $payment->jenisPembayaran }}</td>
                                <td>{{ $payment->status }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $payment->buktiTransfer) }}" alt="Bukti Transfer" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                                    {{-- <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

