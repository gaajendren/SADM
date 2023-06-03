<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseViewController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseMaterialController;

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

Route::get('/', function () {
    return view('legoomhome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/course/export', [CourseController::class, 'export']);
Route::get('/course/pdf', [CourseController::class, 'downloadPDF']);
Route::get('/users/pdf', [UserController::class, 'downloadPDF']);
Route::get('/roles/pdf', [RoleController::class, 'downloadPDF']);
Route::get('/coursematerials/pdf', [CourseMaterialController::class, 'downloadPDF']);
Route::get('/permissions/pdf', [PermissionController::class, 'downloadPDF']);
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'update_avatar']);



Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('course', CourseController::class);
    Route::resource('coursematerials', CourseMaterialController::class);
    Route::get('/campus', [CourseController::class, 'campus']);
   
    Route::get('/campus/{id}', [CourseController::class, 'details']);

});
   







