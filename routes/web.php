<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\EmailSubscriptionController;

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


Route::get('/', [CallCenterController::class, 'getHomeOffersData']);
Route::get('/storeEmail', [EmailSubscriptionController::class, 'subscribe'])->name('subscribe');
// Route::post('/storeEmail', [EmailSubscriptionController::class, 'subscribe'])->name('subscribe');

// // Route::post('/subscribe', 'SubscribeEmailController@subscribe')->name('subscribe');

