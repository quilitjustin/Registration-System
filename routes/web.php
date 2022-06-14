<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExportController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// middleware = \app\Http\Middleware\Role.php
Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'role:admin',
        'as' => 'admin.',
    ], function(){
        //For managing Users
        Route::resource('users', App\Http\Controllers\Admin\ManageUsersController::class);
        //For managing Student Records
        Route::resource('students', App\Http\Controllers\Admin\ManageStudentRecord::class);
        //For every export request
        // Route::group([
        //     'prefix' => 'export',
        //     'as' => 'export.',
        // ], function(){
            //View of export page
            Route::get('export', function(){
                return view('Admin.export');
            })->name('export');
            //Export Users into csv
            Route::get('export_users', [ExportController::class, 'exportUsers'])->name('export_users');
            //Export Students into csv
            Route::get('export_students', [ExportController::class, 'exportStudents'])->name('export_students');
            //Export Address into csv
            Route::get('export_address', [ExportController::class, 'exportAddress'])->name('export_address');
        // });
    });

    Route::group([
        'prefix' => 'staff',
        'middleware' => 'role:staff',
        'as' => 'staff.',
    ], function(){
        //For managing Student Records
        Route::resource('students', App\Http\Controllers\Staff\ManageStudentRecord::class);
    });
});
