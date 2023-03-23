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

Route::get('/redirects', [HomeController::class, 'redirects']);

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
