<?php

use App\Http\Controllers\WelcomeController;
use App\Livewire\Berita;
use App\Livewire\BeritaShow;
use App\Livewire\Pengurus;
use App\Livewire\Program;
use App\Livewire\Tentang;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/tentang', Tentang::class)->name('tentang');
Route::get('/visi-misi', VisiMisi::class)->name('visi-misi');
Route::get('/pengurus', Pengurus::class)->name('pengurus');
Route::get('/program', Program::class)->name('program');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita/{slug}', BeritaShow::class)->name('berita.show');
