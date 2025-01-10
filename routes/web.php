<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        // dd($locale);
    }
    return redirect()->back();
})->name('set-locale');

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::get('/settings', [UserController::class, 'settings'])->name('settings');
    Route::post('/settings/hide-profile', [UserController::class, 'hideProfile'])->name('settings.hide-profile');
    Route::post('/settings/unhide-profile', [UserController::class, 'unhideProfile'])->name('settings.unhide-profile');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('/liked-back', [UserController::class, 'likedBack'])->name('user.likedBack');
    Route::post('/like/{id}', [UserController::class, 'likeUser'])->name('like.user');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/add-balance', [WalletController::class, 'addBalance'])->name('wallet.add-balance');

    Route::get('/payment', [PaymentController::class, 'showPaymentForm']);
    Route::post('/payment', [PaymentController::class, 'processPayment']);
    Route::post('/store_balance', [PaymentController::class, 'storeBalance'])->name('store_balance');
    Route::post('/reenter_payment', [PaymentController::class, 'reenterPayment'])->name('reenter_payment');
});