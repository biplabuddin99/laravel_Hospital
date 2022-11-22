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
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\TestCategoryController;

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

//schedule
Route::resource('shift',ShiftController::class);
Route::resource('schedule',ScheduleController::class);


//birth
Route::resource('birth',BirthController::class);

//death
Route::resource('death',DeathController::class);

//operation
Route::resource('operation',OperationController::class);


//room
Route::resource('roomCategory',RoomCategoryController::class);

//test-cat
Route::resource('testCategory',TestCategoryController::class);
