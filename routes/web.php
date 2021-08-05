<?php

use App\Http\Controllers\AbsensController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PendidikansController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\KontaksController;
use App\Http\Controllers\KontraksController;
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

Route::get('', [ProfilesController::class, 'profiles']);

Route::resources([
    'Profiles' => ProfilesController::class,
    'absens' => AbsensController::class,
    'pendidikans' => PendidikansController::class,
    'works' => WorksController::class,
    'kontaks' => KontaksController::class,
    'home' => ProfilesController::class,

]);
Route::get('/absens/addmember/{absen}', [AbsensController::class, 'addmember']);
Route::put('/absens/addmember/{absen}', [AbsensController::class, 'updateaddmember']);
Route::put('/absens/deleteaddmember/{absen}', [AbsensController::class, 'deleteaddmember']);