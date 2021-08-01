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
Route::get('/annunci/index/{category?}', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/annunci/nuovo', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImages'])->name('images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('images.remove');
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('images.index');

Route::post('/annunci/salva', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/annunci/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/annunci/modifica/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/annunci/aggiorna/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::delete('/annunci/aggiorna/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');


//! Rotte utenti
Route::get('/profilo', [UserController::class, 'show'])->name('user.show');
Route::get('/profilo/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/profilo/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/riepilogo/annunci/{user?}', [AnnouncementController::class, 'indexByUser'])->name('user.announcements');
Route::get('/candidati', [PublicController::class, 'apply'])->name('user.apply');
Route::post('/candidati/invia', [PublicController::class, 'submit'])->name('application.submit');



//! Rotte revisore
Route::get('/revisor/home/{announcement}', [RevisorController::class, 'index'])->name('revisor.panel');
Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
Route::post('/revisor/accepted/{id}', [RevisorController::class, 'accept'])->name('revisor.accepted');
Route::post('/revisor/rejected/{id}', [RevisorController::class, 'reject'])->name('revisor.rejected');
Route::post('/revisor/undo/{id}', [RevisorController::class, 'undo'])->name('revisor.undo');

Route::get('/search', [PublicController::class, 'search'])->name('search');

Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');