<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//! Rotte annunci
Route::get('/annunci/nuovo', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/annunci/salva', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/annunci/{category?}', [AnnouncementController::class, 'index'])->name('announcements.index');
