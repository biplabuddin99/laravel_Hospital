<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepertmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

// authentication
Route::get('/', [UserController::class, 'userLoginForm'])->name('userlogin');
Route::post('/', [UserController::class, 'userLoginCheck'])->name('userlogin');
Route::get('register', [UserController::class, 'signUpForm'])->name('userstore');
Route::post('register', [UserController::class, 'userRegistrationStore'])->name('userstore');

// Doctor route
Route::resource('depertment',DepertmentController::class);
Route::resource('designation',DesignationController::class);


//Appoint route
Route::resource('appoint',AppointmentController::class);

//Patient route
Route::resource('patient',PatientController::class);
