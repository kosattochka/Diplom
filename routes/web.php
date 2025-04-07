<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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
Route::get('/password/reset', [UserController::class, 'viewResetPassword']);

Route::get('/placement', [PlacementController::class, 'many']);
Route::get('/placement/{alias}', [PlacementController::class, 'index']);

Route::get('/service', [ServiceController::class, 'many']);
Route::get('/service/{alias}', [ServiceController::class, 'index']);

Route::get('/rule', [RuleController::class, 'many']);
Route::get('/rule/{alias}', [RuleController::class, 'index']);

Route::get('/event', [EventController::class, 'many']);
Route::get('/event/{alias}', [EventController::class, 'index']);

Route::get('/new', [NewsController::class, 'many']);
Route::get('/new/{alias}', [NewsController::class, 'index']);

Route::get('/gallery', [AlbumController::class, 'many']);
Route::get('/gallery/{alias}', [AlbumController::class, 'index']);

Route::get('/review', [PageController::class, 'review']);

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/politics', [PageController::class, 'politics']);

Route::get('/account', [UserController::class, 'page']);
Route::get('/logout', [UserController::class, 'logout']);


