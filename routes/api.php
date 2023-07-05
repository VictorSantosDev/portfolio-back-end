<?php

use App\Http\Controllers\SendMailPortfolioController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/send-email-portfolio', [SendMailPortfolioController::class, 'sendAction'])
    ->name('send-email-portfolio');
