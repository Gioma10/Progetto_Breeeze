<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/annuncio/inserisci', [AnnouncementController::class, 'addAnnouncement'])->name('add-announcement');
Route::get('/annuncio/{announcement}', [PublicController::class, 'showAnnouncement'])->name('announcements_show');
Route::get('/annunci/tutti', [PublicController::class, 'indexAnnouncement'])->name('announcements_index');

// Rotte revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');