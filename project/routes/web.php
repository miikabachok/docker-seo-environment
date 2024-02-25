<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShowController;
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

Route::get('/', IndexController::class)->name('/');

Route::get('/contacts', ContactsController::class)->name('contacts');

Route::match(['get', 'post'], '/shows/{id?}', [ShowController::class, 'router'])->where('id', '[0-9A-z]+')->name('shows');
