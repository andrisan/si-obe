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

Route::get('/faculties/{faculty}/departments', [DepartmentController::class, 'index']);

Route::get('/course-classes/{test}/edit', function () {
    return view('course-classes/edit');
})->middleware(['auth']);

Route::get('/course-classes/search', function () {
    return view('course-classes/search');
})->middleware(['auth']);

Route::get('/criterias/{id}', [criteriaController::class, 'show']);

Route::resource('llos', lloController::class);

Route::get('/course-classes/new', function () {
    return view('course-classes/create');
})->middleware(['auth']);

Route::get('/rubrics/{rubric}/criterias/{criteria}/criteria-levels/{criteria-level}/edit', function () {
    return view('criteria-levels/edit');
})->middleware(['auth']);

Route::get('/criteria-levels/{id}', [levelsController::class, 'show']);

Route ::resource('rubrics', RubricsController::class)->middleware(['auth'])->only('show', 'create');

Route::resource('syllabi.ilos.clos', CourseLearningOutcomeController::class);

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth']);

Route::get('/syllabi/syllabus/ilos/1/edit', function () {
    return view('ilos.edit');
})->middleware(['auth']);

Route::get('/Ilos/index', [IloController::class,'index'])->middleware(['auth']);

Route::get('/course-class/index', [CourseClassController::class,'index'])->middleware(['auth']);
Route::get('/course-classes/index2', function () {
    return view('course-classes.index2');
})->middleware(['auth']);

require __DIR__.'/auth.php';