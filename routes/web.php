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
Route::get('/centre-appelle', [CallCenterController::class, 'callCenter'])->name('callCenter');
Route::get('/quiz', [CallCenterController::class, 'quiz'])->name('quiz');
Route::get('/storeEmail', [EmailSubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/contact', [EmailSubscriptionController::class, 'contact'])->name('contact');
Route::get('send-mail', [MailController::class, 'submitForm']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/delete/email/{id}', [EmailSubscriptionController::class, 'destroy'])->name('delete.email');

