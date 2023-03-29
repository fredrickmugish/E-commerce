<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/redirects', [HomeController::class, 'redirects'])->middleware('auth', 'verified');

Route::get('/categoryview', [AdminController::class, 'categoryview']);

Route::post('/category', [AdminController::class, 'category']);

Route::get('/deletecategory/{id}', [AdminController::class, 'deletecategory']);

Route::get('/addproducts', [AdminController::class, 'addproducts']);

Route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);

Route::get('/showproducts', [AdminController::class, 'showproducts']);

Route::get('/updateproducts/{id}', [AdminController::class, 'updateproducts']);

Route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

Route::get('/productdetail/{id}', [HomeController::class, 'productdetail']);

Route::post('/addcart/{id}', [HomeController::class, 'addcart']);

Route::get('/showcart', [HomeController::class, 'showcart']);

Route::get('/deletecart/{id}', [HomeController::class, 'deletecart']);

Route::get('/cashorder', [HomeController::class, 'cashorder']);

Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('/order', [AdminController::class, 'order']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

Route::get('/printpdf/{id}', [AdminController::class, 'printpdf']);

Route::get('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

Route::get('/search', [AdminController::class, 'search']);

Route::get('/showorder', [HomeController::class, 'showorder']);

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

Route::get('/product_search', [HomeController::class, 'product_search']);

Route::get('/products', [HomeController::class, 'products']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
