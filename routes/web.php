<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;

/*
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
//kategory
Route::get('/category/{category}', [produkController::class, 'indexByCategory'])->name('products.by.category');

// produk
Route::get("/produk", [produkController::class, "index"])->name("produk.index");
Route::get("/produk/create", [produkController::class, "create"])->name("produk.create");
Route::post("/produk/store", [produkController::class, "store"])->name("produk.store");
Route::get("/produk/edit/{id}", [produkController::class, "edit"])->name("produk.edit");
Route::patch("/produk/update/{id}", [produkController::class, "update"])->name("produk.update");
Route::delete("/produk/delete/{id}", [produkController::class, "destroy"]);

//keranjang
Route::get('/tes', [produkController::class, 'tes']);
Route::get('cart', [produkController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [produkController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [produkController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [produkController::class, 'remove'])->name('remove.from.cart');


require __DIR__.'/auth.php';