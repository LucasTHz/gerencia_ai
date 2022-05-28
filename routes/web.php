<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EditalController::class, 'resumo'])->name('home');

Route::resources([
    'estudante' => EstudanteController::class,
    'professor' => ProfessorController::class,
    'instituicao' => InstituicaoController::class,
    'edital' => EditalController::class,
]);
