<?php

use App\Http\Middleware\AdminMiddleware;
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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientAdmitController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\InvoiceTestController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\UserDetailsController;

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
Route::get('react', function () {
    return view('welcome'); 
});

Route::resource('/',FrontendController::class);
Route::resource('welcome',FrontendController::class);
Route::post('welcome/appointment', [FrontendController::class,'postApp'])->name('welcome.appointment');
Route::get('/getPatient', [FrontendController::class, 'get_patient'])->name('welcome.getPatient');
Route::get('/getEmploy', [FrontendController::class, 'getEmploy'])->name('welcome.getEmploy');
Route::get('/getSchedule', [FrontendController::class, 'getSchedule'])->name('welcome.getSchedule');
Route::get('/getSerial', [FrontendController::class, 'getSerial'])->name('welcome.getSerial');
Route::get('/admin', [UserController::class, 'userLoginForm'])->name('userlogin');
Route::post('/admim', [UserController::class, 'userLoginCheck'])->name('userlogin');
Route::get('logout', [UserController::class, 'logOut'])->name('logout');

Route::get('register', [UserController::class, 'signUpForm'])->name('userstore');
Route::post('register', [UserController::class, 'userRegistrationStore'])->name('userstore');



Route::group(['middleware' => AdminMiddleware::class], function () {
    Route::prefix('admin')->group(function () {

        Route::resource('userDetails',UserDetailsController::class);
        Route::resource('dashboard', DashboardController::class);
        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('admin.dashboard');
    /*====================Doctor Sector ==============*/
        Route::resource('department',DepartmentController::class);
        Route::resource('designation',DesignationController::class);
        Route::resource('doctor',DoctorController::class);

        //employee
        Route::resource('employee',EmployeeController::class);
        // Route::get('employee',[EmployeeController::class,'profile']);


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


        /*====================prescription sector============*/
		Route::resource('prescription',PrescriptionController::class);
    });
});
