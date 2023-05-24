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

    
    @if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
    @endif
    {{-- <h4 class="mb-8">Produk</h4> --}}
    <div class="position-relative">
        
        <div class="position-absolute top-0 end-0 mt-5 py-2">
            <a class="btn btn-dark position-relative" type="submit" href="{{ url('/cart') }}">
                <i class="bi-cart-fill me-1"></i>
                Cart 
                <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"></span>
            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </a>
    </div>
</div>

<section class="py-5 mt-5">
    <div class="container px-3 px-lg-3 mt-5 py-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-6">
                <!-- Product image -->
                <img class="img-fluid" src="{{ asset('storage/'. $produk->foto) }}" alt="{{ $produk->nama }}" width="400" height="400">
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Product name -->
                        <h5 class="card-title fw-bolder">{{ $produk->nama }}</h5>
                        <!-- Product price -->
                        <p class="card-text">Rp. {{ $produk->harga }}</p>
                        <!-- Product description -->
                        <p class="card-text">{{ $produk->product_detail }}</p>
                        <!-- Product actions -->
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto btn-sm" href="{{ route('add.to.cart', $produk->id) }}">
                                <i class="fa-solid fa-cart-shopping"></i> Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

