<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [PokedexController::class, 'index'])->name('home');
Route::resource('pokemon', PokemonController::class);
Route::get('/index', [PokemonController::class, 'index'])->name('pokemon.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

