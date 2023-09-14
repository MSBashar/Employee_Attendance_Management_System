<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\JobTitleController;
use App\Http\Controllers\admin\ShiftController;
use App\Http\Controllers\common\AttendanceController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Employee\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {return view('welcome');})->name('welcome');

// Auth Group
Route::middleware(['auth'])->group(function() {

    // Admin Group
    Route::prefix('/admin/')->name('admin.')->middleware(['isAdmin'])->group(function() {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(EmployeeController::class)->group(function() {
            Route::get('employees', 'index')->name('employees');
            Route::post('employee/store', 'store')->name('employee.store');
            Route::put('employee/update/{employee}', 'update')->name('employee.update');
            Route::delete('employee/destroy/{employee}', 'destroy')->name('employee.destroy');
        });

        Route::controller(DepartmentController::class)->group(function() {
            Route::get('departments', 'index')->name('departments');
            Route::post('department/store', 'store')->name('department.store');
            Route::put('department/update/{department}', 'update')->name('department.update');
            Route::delete('department/destroy/{department}', 'destroy')->name('department.destroy');
        });

        Route::controller(JobTitleController::class)->group(function() {
            Route::get('jobTitles', 'index')->name('jobTitles');
            Route::post('jobTitle/store', 'store')->name('jobTitle.store');
            Route::put('jobTitle/update/{jobTitle}', 'update')->name('jobTitle.update');
            Route::delete('jobTitle/destroy/{jobTitle}', 'destroy')->name('jobTitle.destroy');
        });

        Route::controller(ShiftController::class)->group(function() {
            Route::get('shifts', 'index')->name('shifts');
            Route::post('shift/store', 'store')->name('shift.store');
            Route::put('shift/update/{shift}', 'update')->name('shift.update');
            Route::delete('shift/destroy/{shift}', 'destroy')->name('shift.destroy');
        });

        Route::controller(AttendanceController::class)->group(function() {
            Route::get('attendances', 'index')->name('attendances');
        });

        // Reports
        Route::prefix('/report/')->name('report.')->group(function() {

            Route::controller(AttendanceController::class)->group(function() {
                Route::get('attendances', 'reportIndex')->name('attendances');
                Route::get('pdf/convert', 'pdfGeneration')->name('pdf.convert');
            });
        });
    });

    // User Group
    Route::prefix('/user/')->name('user.')->group(function() {

        Route::controller(EmployeeController::class)->group(function() {
            Route::get('account', 'showAccount')->name('account');
            Route::put('update', 'updateAccount')->name('update');
        });

        Route::controller(AttendanceController::class)->group(function() {
            Route::get('check', 'create')->name('check');
            Route::post('check', 'store')->name('check.in.out');
            Route::delete('attendance/destroy/{attendance}', 'destroy')->name('attendance.destroy');
        });
    });

    // Employee Group
    Route::prefix('/employee/')->name('employee.')->middleware(['isEmployee'])->group(function() {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(EmployeeController::class)->group(function() {
            //
        });
    });

});



