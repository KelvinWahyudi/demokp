<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\PaymentController;

/*use App\Http\Controllers\DetailPembelianController;

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get("/produks", [produkController::class, "produk"])->name("produk");



// Route::get("/pembayaran", [PaymentController::class, "payment"])->name("payment");

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get("/transaksi", function() {
    return view('transaksi.index');
});



// Route::prefix('detailpembelian')->group(function () {
//     Route::get('/', [DetailPembelianController::class, 'index'])->name('detailpembelian.index');
//     Route::get('/create', [DetailPembelianController::class, 'create'])->name('detailpembelian.create');
//     Route::post('/store', [DetailPembelianController::class, 'store'])->name('detailpembelian.store');
//     Route::get('/edit/{id}', [DetailPembelianController::class, 'edit'])->name('detailpembelian.edit');
//     Route::post('/update/{id}', [DetailPembelianController::class, 'update'])->name('detailpembelian.update');
//     Route::get('/delete/{id}', [DetailPembelianController::class, 'delete'])->name('detailpembelian.delete');
// });

Route::get("/detailpembelian/{id}", [DetailPembelianController::class, "index"])->name('detailpembelian.index')->middleware('auth');

// Route::post("/detailpembelian/store/{id}", [detail_pembelianController::class, "store"])->name("detailpembelian.store");

// Route::get("/detailpembelian/{id}", [DetailPembelianController::class, "index"])->name('detailpembelian.index');

// Route::post("/detailpembelian/store/{id}", [detail_pembelianController::class, "store"])->name("detailpembelian.store");


Route::get('/payments/{id}', [PaymentController::class, 'index'])->name('detailpembelian.index');
Route::get('/pembayaran', [PaymentController::class, 'pembayaran_index'])->name('pembayaran.index')->middleware('auth');
Route::get('/detailpembelian/create', [DetailPembelianController::class, 'create'])->name('detailpembelian.create');



// Route::get('/payments/create', [PaymentController::class, 'create'])->name('detailpembelian.create');
Route::post('/payments/store/{id}', [PaymentController::class, 'store'])->name('detailpembelian.store');
Route::get("/payments/edit/{id}", [PaymentController::class, "edit"])->name("edit");
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::post('payments/store/{id}', [PaymentController::class, 'store'])->name('detailpembelian.detail');
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('detailpembelian.show');


//kategory
Route::get('/category/{category}', [produkController::class, 'indexByCategory'])->name('products.by.category');

// produk
Route::get("/produk", [produkController::class, "index"])->name("produk.index");
Route::get("/produk/create", [produkController::class, "create"])->name("produk.create");
Route::post("/produk/store", [produkController::class, "store"])->name("produk.store");
Route::get("/produk/edit/{id}", [produkController::class, "edit"])->name("produk.edit");
Route::patch("/produk/update/{id}", [produkController::class, "update"])->name("produk.update");
Route::delete("/produk/delete/{id}", [produkController::class, "destroy"]);
Route::get('/detail/{id}', [produkController::class, "show"])->name('produk.show');


//keranjang
Route::get('/tes', [produkController::class, 'tes']);
Route::get('cart', [produkController::class, 'cart'])->name('cart.index')->middleware('auth');
Route::get('add-to-cart/{id}', [produkController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::patch('update-cart', [produkController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [produkController::class, 'remove'])->name('remove.from.cart');

// Customer
Route::get("/customer", [CustomerController::class, "index"])->name("customer.index");
Route::get("/customer/create", [CustomerController::class, "create"])->name("customer.create");
Route::post("/customer/store", [CustomerController::class, "store"])->name("customer.store");
Route::get("/customer/edit/{id}", [CustomerController::class, "edit"])->name("customer.edit");
Route::patch("/customer/update/{id}", [CustomerController::class, "update"])->name("customer.update");
Route::delete("/customer/delete/{id}", [CustomerController::class, "destroy"]);



require __DIR__.'/auth.php';