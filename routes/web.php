<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomListController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PatientAdmitController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\InvoiceTestController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::resource('dashboard', DashboardController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

// authentication
Route::get('/', [UserController::class, 'userLoginForm'])->name('userlogin');
Route::post('/', [UserController::class, 'userLoginCheck'])->name('userlogin');
Route::get('logout', [UserController::class, 'logOut'])->name('logout');

Route::get('register', [UserController::class, 'signUpForm'])->name('userstore');
Route::post('register', [UserController::class, 'userRegistrationStore'])->name('userstore');

// Doctor route
Route::resource('department',DepartmentController::class);
Route::resource('designation',DesignationController::class);
Route::resource('doctor',DoctorController::class);

//employee
Route::resource('employee',EmployeeController::class);
// Route::get('profile/{id}',EmployeeController::class,'profile');


/*====================Appointment Sector ==============*/
Route::resource('appoint',AppointmentController::class);
Route::get('/getPatient', [AppointmentController::class, 'get_patient'])->name('app.getPatient');
Route::get('/getEmploy', [AppointmentController::class, 'getEmploy'])->name('app.getEmploy');
Route::get('/getSchedule', [AppointmentController::class, 'getSchedule'])->name('app.getSchedule');
Route::get('/getSerial', [AppointmentController::class, 'getSerial'])->name('app.getSerial');

//Patient route
Route::resource('patient',PatientController::class);
Route::get('/room/get_room',[PatientAdmitController::class,'getroomlist'])->name('room.get_room');
Route::resource('patientAdmit',PatientAdmitController::class);

/*====================schedule Sector ==============*/
Route::resource('shift',ShiftController::class);
Route::resource('schedule',ScheduleController::class);
Route::get('/scheduleget', [ScheduleController::class, 'show'])->name('scheduleget');


//birth
Route::resource('birth',BirthController::class);

//death
Route::resource('death',DeathController::class);

//operation
Route::resource('operation',OperationController::class);


/*====================Room Sector ==============*/
Route::resource('roomCategory',RoomCategoryController::class);

Route::resource('roomList',RoomListController::class);

/*====================Test Sector ==============*/
Route::resource('testCategory',TestCategoryController::class);
Route::resource('test',TestController::class);

/*====================invoice Sector ==============*/
Route::get('/inv/search',[InvoiceTestController::class,'getpatient'])->name('inv.getpatient');
Route::get('/inv/get_test_price',[InvoiceTestController::class,'get_test_price'])->name('inv.get_test_price');
Route::get('/inv/get_test',[InvoiceTestController::class,'get_test'])->name('inv.get_test');
Route::resource('invoiceTest',InvoiceTestController::class);
