<?php


use App\Http\Controllers\Api\ProfilesController;
use App\Http\Controllers\Api\PendidikansController;
use App\Http\Controllers\Api\WorksController;
use App\Http\Controllers\Api\KontaksController;
use App\Http\Controllers\Api\JadwalsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [ProfilesController::class, 'profiles']);
Route::resources([
    'profiles' => ProfilesController::class,
    'pendidikans' => PendidikansController::class,
    'works' => WorksController::class,
    'kontaks' => KontaksController::class,
 
    
]);