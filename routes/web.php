<?php

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
    });

    Route::group([
        'prefix' => 'staff',
        'middleware' => 'role:staff',
        'as' => 'staff.',
    ], function(){
        //For managing Users
        Route::resource('students', App\Http\Controllers\Staff\StudentRecordController::class);
    });
});
