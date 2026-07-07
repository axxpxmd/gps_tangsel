<?php

use App\Http\Controllers\WelcomeController;
use App\Livewire\Berita;
use App\Livewire\BeritaShow;
use App\Livewire\Tentang;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/tentang', Tentang::class)->name('tentang');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita/{slug}', BeritaShow::class)->name('berita.show');
