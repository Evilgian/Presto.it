<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

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
Route::get('/annunci/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');


//! Rotte utenti
Route::get('/profilo', [UserController::class, 'show'])->name('user.show');
Route::get('/profilo/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/profilo/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/riepilogo/annunci/{user?}', [AnnouncementController::class, 'indexByUser'])->name('user.announcements');

//Rotte revisore

Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.panel');
Route::post('/revisor/accepted/{id}', [RevisorController::class, 'accept'])->name('revisor.accepted');
Route::post('/revisor/rejected/{id}', [RevisorController::class, 'reject'])->name('revisor.rejected');