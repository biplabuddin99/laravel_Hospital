<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientAdmitController;

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
Route::resource('department',DepartmentController::class);
Route::resource('designation',DesignationController::class);
Route::resource('doctor',DoctorController::class);

//employee
Route::resource('employee',EmployeeController::class);


//Appoint route
Route::resource('appoint',AppointmentController::class);

//Patient route
Route::resource('patient',PatientController::class);
Route::resource('patientAdmit',PatientAdmitController::class);
