<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\EmailSubscriptionController;
use App\Http\Controllers\MailController;

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
Route::get('/callcenter', [CallCenterController::class, 'callCenter'])->name('callCenter');
Route::get('/storeEmail', [EmailSubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/contact', [EmailSubscriptionController::class, 'contact'])->name('contact');
Route::get('/sendMail', [EmailSubscriptionController::class, 'sendMail'])->name('sendMail');

// // Route::post('/subscribe', 'SubscribeEmailController@subscribe')->name('subscribe');

