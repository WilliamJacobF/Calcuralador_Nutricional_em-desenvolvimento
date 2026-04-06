<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alimentocontroller;


Route::get('/alimentos', [alimentocontroller::class, 'index']);
Route::get('/alimentos/buscar/{nome}', [alimentocontroller::class, 'buscarPorNome']);