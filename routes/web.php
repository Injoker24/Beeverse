<?php

use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'homePage']);
Route::get('/search', [Controller::class, 'searchPage']);

Route::get('/login', [Controller::class, 'loginPage']);
Route::post('/login/auth', [Controller::class, 'login']);
Route::get('/register', [Controller::class, 'registerPage']);
Route::post('/register/auth', [Controller::class, 'registerValidation']);
Route::get('/register/payment', [Controller::class, 'paymentPage']);
Route::post('/register/payment/auth', [Controller::class, 'paymentValidation']);

Route::middleware(['user'])->group(function () {
    Route::get('/logout', [Controller::class, 'logout']);

    Route::get('/profile/{id}', [Controller::class, 'profilePage']);
    Route::post('/profile/add/{id}', [Controller::class, 'addToWishlist']);
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
    Route::post('/setting/setVisibility', [Controller::class, 'setVisibility']);
});

