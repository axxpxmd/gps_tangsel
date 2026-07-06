<?php

use App\Http\Controllers\WelcomeController;
use App\Livewire\Tentang;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/tentang', Tentang::class)->name('tentang');
