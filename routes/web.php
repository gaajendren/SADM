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
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DriversTimetableController;
use App\Http\Controllers\ScheduleController;
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

Route::put('/driver/{driverId}/schedules/index', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/calendar/{driverId}', [ScheduleController::class, 'calendar'])->name('schedules.calendar');

Route::get('/driver/{driverId}/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/driver/{driverId}/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/driver/{driverId}/schedules/{scheduleId}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/driver/{driverId}/schedules/{scheduleId}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/driver/{driverId}/schedules/{scheduleId}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/course/export', [CourseController::class, 'export']);
Route::get('/course/pdf', [CourseController::class, 'downloadPDF']);
Route::get('/course/{id}/pdf', [CourseController::class, 'singlePDF']);
Route::get('/exports/export', [ExportController::class, 'export']);
Route::get('/exports/pdf', [ExportController::class, 'downloadPDF']);
Route::get('/exports/{id}/pdf', [ExportController::class, 'singlePDF']);
Route::get('/driver/export', [DriverTimetableController::class, 'export']);
Route::get('/driver/pdf', [DriverTimetableController::class, 'downloadPDF']);

Route::get('/users/pdf', [UserController::class, 'downloadPDF']);
Route::get('/roles/pdf', [RoleController::class, 'downloadPDF']);
Route::get('/coursematerials/pdf', [CourseMaterialController::class, 'downloadPDF']);
Route::get('/permissions/pdf', [PermissionController::class, 'downloadPDF']);
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'update_avatar']);



Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('driver' , DriversTimetableController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('course', CourseController::class);
    Route::resource('exports', ExportController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('coursematerials', CourseMaterialController::class);
    Route::get('/campus', [CourseController::class, 'campus']);
   
    Route::get('/campus/{id}', [CourseController::class, 'details']);

});
   







