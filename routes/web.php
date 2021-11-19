<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auction/new', [App\Http\Controllers\CreateAuctionFormController::class, 'index'])->name('newAuction');
Route::post('/auction/new', [App\Http\Controllers\CreateAuctionFormController::class, 'create'])->name('newAuction');

Route::get('profile', [App\Http\Controllers\EditUserController::class, 'index'])->name('profile');
Route::post('profile', [App\Http\Controllers\EditUserController::class, 'updateProfile'])->name('profile');

Route::get('/auction/${id}', [App\Http\Controllers\AuctionController::class, 'index'])->name('auctionDetail');
Route::get('/auction/${id}/bid', [App\Http\Controllers\AuctionController::class, 'bid'])->name('makeBid');
Route::get('/auction/time', [App\Http\Controllers\AuctionController::class, 'time'])->name('getTime');