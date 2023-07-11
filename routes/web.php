<?php

use App\Http\Controllers\ClothesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);

    Route::get('/profile/edit-password', [UserController::class, 'editPasswordForm']);

    Route::post('/profile/edit-password/processing', [UserController::class, 'editPassword']);

    Route::get('/sign-out', [UserController::class, 'signOut']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add-item', [ClothesController::class, 'addClothesForm']);

    Route::post('/add-item/processing', [ClothesController::class, 'addClothes']);

    Route::post('/product/{id}/restock', [ClothesController::class, 'restockClothes']);

    Route::get('/product/{id}/delete', [ClothesController::class, 'removeClothes']);
});

Route::middleware(['auth', 'member'])->group(function () {
    Route::get('/cart', [TransactionController::class, 'viewCart']);

    Route::get('/cart/edit/{id}', [TransactionController::class, 'editCartForm']);

    Route::post('/cart/edit/{id}/processing', [TransactionController::class, 'editCart']);

    Route::get('/cart/delete/{id}', [ClothesController::class, 'removeCart']);

    Route::get('/checkout', [TransactionController::class, 'checkout']);

    Route::get('/history', [TransactionController::class, 'viewHistory']);

    Route::get('/profile/edit-profile', [UserController::class, 'editProfileForm']);

    Route::post('/profile/edit-profile/processing', [UserController::class, 'editProfile']);

    Route::post('/product/{id}/add-to-cart', [ClothesController::class, 'addToCart']);
});

Route::middleware('guest')->group(function () {
    Route::get('/welcome', [IndexController::class, 'welcome']);

    Route::get('/sign-up', [UserController::class, 'signUp']);

    Route::post('/sign-up/processing', [UserController::class, 'signUpProcess']);

    Route::get('/sign-in', [UserController::class, 'signIn'])->name('login');

    Route::post('/sign-in/processing', [UserController::class, 'signInProcess']);
});

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/home', [ClothesController::class, 'viewAllClothes']);

Route::get('/product', function(){
    return redirect('/home');
});

Route::get('/product/{id}', [ClothesController::class, 'viewClothes']);

Route::get('/search', [ClothesController::class, 'searchForm']);

Route::get('/result', [ClothesController::class, 'search']);
