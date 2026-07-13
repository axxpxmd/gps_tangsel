<?php

use App\Http\Controllers\Console\ActivityController;
use App\Http\Controllers\Console\ArticleOldController;
use App\Http\Controllers\Console\BoardMemberController;
use App\Http\Controllers\Console\DashboardController;
use App\Http\Controllers\Console\GalleryController;
use App\Http\Controllers\Console\HaditsController;
use App\Http\Controllers\Console\LoginController;
use App\Http\Controllers\Console\PartnerController;
use App\Http\Controllers\Console\ProgramController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Berita;
use App\Livewire\BeritaShow;
use App\Livewire\Galeri;
use App\Livewire\Pengurus;
use App\Livewire\Program;
use App\Livewire\Tentang;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');

// Redirect default Laravel auth to CMS login
Route::redirect('/login', '/console/login')->name('login');

Route::get('/tentang', Tentang::class)->name('tentang');
Route::get('/visi-misi', VisiMisi::class)->name('visi-misi');
Route::get('/pengurus', Pengurus::class)->name('pengurus');
Route::get('/program', Program::class)->name('program');
Route::get('/galeri', Galeri::class)->name('galeri');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita/{slug}', BeritaShow::class)->name('berita.show');

Route::prefix('console')->name('console.')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
        Route::resource('programs', ProgramController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('board-members', BoardMemberController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('hadits', HaditsController::class);
        Route::resource('article-old', ArticleOldController::class)->only(['index', 'show']);
        Route::post('article-old/fetch', [ArticleOldController::class, 'fetch'])->name('article-old.fetch');
        Route::delete('galleries/{gallery}/images/{image}', [GalleryController::class, 'deleteImage'])->name('galleries.delete-image');
    });
});
