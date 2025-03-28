<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'index']);

Route::get('/placement', [PageController::class, 'placement']);

Route::get('/service', [PageController::class, 'service']);

Route::get('/rule', [PageController::class, 'rule']);

Route::get('/event', [PageController::class, 'event']);

Route::get('/new', [PageController::class, 'new']);

Route::get('/gallery', [PageController::class, 'gallery']);

Route::get('/review', [PageController::class, 'review']);

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/politics', [PageController::class, 'politics']);


