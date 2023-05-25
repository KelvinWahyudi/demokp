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

<section class="py-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('payment.update', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <!-- Tambahkan input fields untuk nama, noTelp, alamat, jenisPembayaran, buktiTransfer, dan status -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" id="nama" value="{{ $payment->nama }}" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="noTelp" class="form-label">No. Telepon:</label>
                        <input type="text" name="noTelp" id="noTelp" value="{{ $payment->noTelp }}" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" name="alamat" id="alamat" value="{{ $payment->alamat }}" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="jenisPembayaran" class="form-label">Jenis Pembayaran:</label>
                        <input type="text" name="jenisPembayaran" id="jenisPembayaran" value="{{ $payment->jenisPembayaran }}" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="buktiTransfer" class="form-label">Bukti Transfer:</label>
                        <input type="text" name="buktiTransfer" id="buktiTransfer" value="{{ $payment->buktiTransfer }}" class="form-control" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select" required>
                            @foreach ($statusOptions as $option)
                                <option value="{{ $option }}" {{ $payment->status === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
