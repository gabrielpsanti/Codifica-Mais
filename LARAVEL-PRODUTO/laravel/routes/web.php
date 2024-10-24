<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProdutoController, SeriesController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('series', [SeriesController::class, 'index']);


Route::resource('produtos', ProdutoController::class);