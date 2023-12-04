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


Route::get('/callcenters/{callCanter}/offres-emploi', [CallCenterController::class, 'calCenterZoneJobs']);
Route::get('/', [CallCenterController::class, 'getHomeOffersData']);
Route::get('/application/{url}', [CallCenterController::class, 'jobApply']);
Route::get('Ville/{city}', [CallCenterController::class, 'getOffersData']);
Route::get('Type/{type}', [CallCenterController::class, 'getOffersDataType']);
Route::get('Filter/{city}/{type}', [CallCenterController::class, 'getOffersData']);
Route::get('/centre-appelle', [CallCenterController::class, 'callCenter'])->name('callCenter');
Route::get('/centre-appelle/Ville/{city}', [CallCenterController::class, 'callCenterFilter'])->name('callCenterFilter');
Route::get('/quiz', [CallCenterController::class, 'quiz'])->name('quiz');
Route::get('/quiz/{title}', [CallCenterController::class, 'quizZone'])->name('quizZone');
Route::get('/storeEmail', [EmailSubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/contact', [EmailSubscriptionController::class, 'contact'])->name('contact');
Route::get('send-mail', [MailController::class, 'submitForm']);


