<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\OwnedAvatarController;
use App\Http\Controllers\AvatarController;
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
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return back();
});

Route::get('/', [Controller::class, 'homePage'])->name('home'); //Done
Route::get('/search', [Controller::class, 'searchPage']); //Done
Route::get('/filter', [Controller::class, 'filterPage']); //Done

Route::get('/login', [Controller::class, 'loginPage'])->name('login'); //Done
Route::post('/login/auth', [UserController::class, 'login']); //Done
Route::get('/register', [Controller::class, 'registerPage']); //Done
Route::post('/register/auth', [UserController::class, 'register']); //Done

Route::middleware(['user'])->group(function () {
    Route::get('/payment', [Controller::class, 'paymentPage'])->name('payment'); //Done
    Route::post('/payment/auth', [UserController::class, 'payment']); //Done

    Route::get('/logout', [UserController::class, 'logout']); //Done
});

Route::middleware(['paid'])->group(function () {
    Route::get('/profile/{id}', [Controller::class, 'profilePage']); //Done
    Route::post('/profile/add/{id}', [WishlistController::class, 'addToWishlist']); //Done
    Route::get('/wishlist', [Controller::class, 'wishlistPage']); //Done
    Route::post('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist']); //Done

    Route::get('/friend', [Controller::class, 'friendPage']); //Done
    Route::post('/friend/remove/{id}', [FriendsController::class, 'removeFromFriends']); //Done

    Route::get('/inventory', [Controller::class, 'inventoryPage']); //Done
    Route::post('/inventory/apply/{id}', [OwnedAvatarController::class, 'applyAvatar']); //Done

    Route::get('/shop', [Controller::class, 'shopPage']); //Done
    Route::post('/shop/gift/{id}', [AvatarController::class, 'sendGift']);
    Route::post('/shop/{id}', [AvatarController::class, 'buyAvatar']); //Done

    Route::get('/topup', [Controller::class, 'topupPage']); //Done
    Route::post('/topup', [UserController::class, 'topup']); //Done

    Route::get('/setting', [Controller::class, 'settingPage']); //Done
    Route::post('/setting/setVisibility', [UserController::class, 'setVisibility']); //Done
});

