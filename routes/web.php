<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ManageAttendanceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MyAttendanceController;
use App\Http\Controllers\StaineController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\AutorisationController;
use App\Http\Controllers\AttController;












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

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){
   
    
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');
    
    Route::post('update-profile-info',[ProfileController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-password',[ProfileController::class,'changePassword'])->name('adminChangePassword');

    
    Route::resource('fonctions', FonctionController::class);
    Route::resource('employes', EmployeController::class);



    Route::resource('staines',StaineController::class);

    Route::get('/staines/create', [StaineController::class, 'create'])
    ->name('staine.create');

    Route::resource('factures',FactureController::class);

    Route::get('/factures/create', [FactureController::class, 'create'])
    ->name('facture.create');
    
    Route::resource('reservations',ReservationController::class);

    Route::get('/reservations/create', [ReservationController::class, 'create'])
    ->name('reservation.create');
    Route::resource('conges',CongeController::class);

    Route::get('/conges/create', [CongeController::class, 'create'])
    ->name('conge.create');
    Route::resource('atts',AttController::class);

    Route::get('/atts/create', [AttController::class, 'create'])
    ->name('att.create');

    Route::resource('autorisations',AutorisationController::class);

    Route::get('/autorisations/create', [AutorisationController::class, 'create'])
    ->name('autorisation.create');

    
    Route::post('autorisation/approve/{id}', [AutorisationController::class, 'approve'])->name('autorisation.approve');
    Route::post('att/approve/{id}', [AttController::class, 'approve'])->name('att.approve');




    Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
    Route::resource('user', UserController::class);
    Route::post('user/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');

    Route::post('conge/approve/{id}', [CongeController::class, 'approve'])->name('conge.approve');
    Route::post('reservation/approve/{id}', [ReservationController::class, 'approve'])->name('reservation.approve');


    Route::get('holidays/index', [HolidayController::class, 'index'])->name('holidays.index');
    Route::get('holidays/create', [HolidayController::class, 'create'])->name('holidays.create');
    Route::post('holidays/store', [HolidayController::class, 'store'])->name('holidays.store');
    Route::get('holidays/edit-holiday/{holiday_id}', [HolidayController::class, 'edit'])->name('holidays.edit');
    Route::put('holidays/{holiday_id}', [HolidayController::class, 'update'])->name('holidays.update');
    Route::delete('holidays/{holiday_id}', [HolidayController::class, 'destroy'])->name('holidays.delete');

    Route::resource('manageattendance', ManageAttendanceController::class);
    Route::resource('index', AttendanceController::class);
    Route::post('attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::patch('ManageAttendanceController/{id}', [ManageAttendanceController::class, 'update'])->name('attendance.update');

    Route::resource('myattendance', MyAttendanceController::class);
    Route::get('/delete-data/{id}', [ManageAttendanceController::class, 'destroy'])->name('delete-data');


    

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
