<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\rubricController;
use App\Http\Controllers\criteriaController;
use App\Http\Controllers\RubricsController;
use App\Http\Controllers\cloController;
use App\Http\Controllers\levelsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseLearningOutcomeController;
use App\Http\Controllers\lloController;
use App\Http\Controllers\IloController;

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
Route::get('/rubric/edit', function () {
    return view('rubrics.edit');
});

Route::resource('rubrics',rubricController::class);
Route::get('/rubric/show', function () {
    return view('rubrics.show');
})->middleware(['auth']);

Route::get('/criteria/edit', function () {
    return view('welcome');
});
Route:: resource('criteria',criteriaController::class);

Route::get('/criteria', function () {
    return view('criteria.create');
});

Route::get('/rubrics/{rubric}/criterias/{criteria}/edit', function () {
    return view('criterias.edit');
});

Route::resource('clos', cloController::class);

Route::resource('faculties', FacultyController::class)->middleware('auth');

Route::get('/syllabi-index', function () {
    return view('syllabi-index');
});

Route::get('/syllabi', function () {
    return view('syllabi.index');
});

Route::resource('faculties/{faculty}/edit', FacultyController::class)->middleware(['auth']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/syllabi/create', function () {
    return view('syllabi.create');
})->middleware(['auth'])->name('syllabi.create');


require __DIR__.'/auth.php';
