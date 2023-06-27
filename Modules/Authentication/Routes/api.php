<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authentication', [AuthenticationController::class, 'authIntegratorAction'])
    ->name('auth-integrator');

Route::post('/generate-token', [AuthenticationController::class, 'generateTokenAction'])
    ->name('generate-token');
