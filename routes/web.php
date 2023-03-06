<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\AuthController;


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
// Route :: get('admin/students',function(){
//     return view('admin/students/index');
// });
Route::get('/',function(){
    return view('user.index');
})->name('user.index');

Route::middleware('isLogin')->group(function(){
    Route::get('/courses',function(){
        return view('user.courses');
    })->name('user.courses');
    Route::get('/subjects',function(){
        return view('user.subjects');
    })->name('user.subjects');
    Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::middleware('IsAdminLogin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('students/archive',[studentController::class, 'archive'])->name('students.archive');
            Route::get('students/{student}/restore',[studentController::class, 'restore'])->name('students.restore');
            Route::delete('students/{student}/destroy',[studentController::class, 'forceDestroy'])->name('students.forceDestroy');
        
            Route::resource('students',studentController::class);
            Route::resource('departments',departmentController::class);
        });
    });
});


Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/register',[AuthController::class,'handleRegister'])->name('auth.handleRegister');
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login',[AuthController::class,'handleLogin'])->name('auth.handleLogin');



