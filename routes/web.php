<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepertmentController;
use App\Http\Controllers\PatientController;

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

Route::get('/', function () {
    return view('dashboard');
});

// Doctor route
Route::resource('department',DepertmentController::class);

Route::resource('patient',PatientController::class);
