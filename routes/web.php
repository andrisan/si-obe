<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseClassesController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/course-classes/index', [CourseClassesController::class,'index'])->middleware(['auth']);
Route::get('/course-classes/index2', function () {
    return view('course-classes.index2');
})->middleware(['auth']);