<?php

use App\Http\Controllers\EstablishmentController;
use App\Http\Resources\BusinessResource;
use App\Models\Establishment;
use App\Services\FHRS\Mapper;
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

Route::get('/', EstablishmentController::class)->name('home');