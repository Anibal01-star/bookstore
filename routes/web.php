<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;



Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*ADMIN */

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('books', BookController::class);

        Route::get('/users', [AdminController::class, 'users'])
            ->name('admin.users');

        Route::get('/messages', [AdminController::class, 'messages'])
            ->name('admin.messages');

        Route::get('/orders', [AdminController::class, 'orders'])
            ->name('admin.orders');

        Route::put('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])
            ->name('admin.orders.status');
    });


/*PUBLIC*/


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/about', [HomeController::class, 'about'])
    ->name('about');

Route::get('/books/{book}', [BookController::class, 'detail'])
    ->name('book.detail');

Route::get('/contact', [ContactController::class, 'index'])
    ->middleware('auth')
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('auth')
    ->name('contact.store');

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth')
    ->name('cart');

Route::post('/cart/{book}', [CartController::class, 'add'])
    ->middleware('auth')
    ->name('cart.add');

Route::put('/cart/item/{item}', [CartController::class, 'update'])
    ->middleware('auth')
    ->name('cart.update');

Route::delete('/cart/item/{item}', [CartController::class, 'remove'])
    ->middleware('auth')
    ->name('cart.remove');

/*PEMESANAN*/


Route::middleware('auth')->group(function () {

Route::get('/checkout', [OrderController::class, 'checkout'])
    ->name('checkout');

Route::post('/checkout', [OrderController::class, 'store'])
    ->name('checkout.store');

Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

Route::get('/orders/{order}', [OrderController::class, 'show'])
    ->name('orders.show');
});