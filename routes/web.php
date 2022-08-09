<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'homePage'])->name('home');
Route::get('/search', [Controller::class, 'searchPage']);
Route::get('/filter', [Controller::class, 'filterPage']);

Route::get('/login', [Controller::class, 'loginPage'])->name('login');
Route::post('/login/auth', [UserController::class, 'login']);
Route::get('/register', [Controller::class, 'registerPage']);
Route::post('/register/auth', [UserController::class, 'register']);

Route::middleware(['user'])->group(function () {
    Route::get('/payment', [Controller::class, 'paymentPage'])->name('payment');
    Route::post('/payment/auth', [UserController::class, 'payment']);

    Route::get('/logout', [UserController::class, 'logout']);
});

Route::middleware(['paid'])->group(function () {
    Route::get('/profile/{id}', [Controller::class, 'profilePage']);
    Route::post('/profile/add/{id}', [WishlistController::class, 'addToWishlist']);
    Route::get('/wishlist', [Controller::class, 'wishlistPage']);
    Route::get('/friend', [Controller::class, 'friendPage']);

    Route::get('/chat/{id}', [Controller::class, 'chatPage']);

    Route::get('/inventory', [Controller::class, 'inventoryPage']);
    Route::post('/inventory/gift/{id}', [Controller::class, 'sendGift']);
    Route::post('/inventory/apply/{id}', [Controller::class, 'applyAvatar']);

    Route::get('/shop', [Controller::class, 'shopPage']);
    Route::post('/shop/{id}', [Controller::class, 'buyAvatar']);

    Route::get('/topup', [Controller::class, 'topupPage']);
    Route::post('/topup', [Controller::class, 'topup']);

    Route::get('/setting', [Controller::class, 'settingPage']);
    Route::post('/setting/setVisibility', [UserController::class, 'setVisibility']);
});

