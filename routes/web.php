<?php

use App\Http\Controllers\ClassPortofolioController;
use App\Http\Controllers\CriteriasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\rubricController;
use App\Http\Controllers\criteriaController;
use App\Http\Controllers\RubricsController;
use App\Http\Controllers\cloController;
use App\Http\Controllers\levelsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseLearningOutcomeController;
use App\Http\Controllers\lloController;
use App\Http\Controllers\IloController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\StudyProgramController;


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

Route::get('/assignment-plans.index', function () {
    return view('assignment-plans.index');
});

Route::get('/student-grades', function () {
    return view('student-grades.show');
});

Route::get('/rubric/edit', function () {
    return view('rubrics.edit');
});

Route::resource('rubrics', rubricController::class);
Route::get('/rubric/show', function () {
    return view('rubrics.show');
})->middleware(['auth']);

Route::get('/criteria/edit', function () {
    return view('welcome');
});
Route::resource('criteria', criteriaController::class);

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

Route::get('/syllabi/{syllabus}/edit', function ($syllabus) {
    return view('syllabi.edit',['syllabus' => $syllabus]);
})->middleware('auth');

Route::resource('faculties', FacultyController::class)->middleware(['auth']);

Route::get('/courses/create', function () {
    return view('courses.create');
})->middleware(['auth']);

Route::resource('faculties.departments', DepartmentController::class)->middleware('auth');

Route::get('/syllabi/{syllabus}/learning-plans/create', function () {
    return view('learning-plans.create');
});

Route::get('/courses/{course}/edit', function () {
    return view('courses.edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('rubrics.criterias', CriteriasController::class);

Route::get('/syllabi/{syllabus}/learning-plans/{learning-plan}/edit', function () {
    return view('assignment-plans.edit');
});

Route::get('/assignment-plans/create', function () {
    return view('assignment-plans.create');
});

Route::get('/courses', function () {
    return view('courses/index');
})->middleware(['auth']);

Route::get('/course-classes/search', function () {
    return view('course-classes/search');
})->middleware(['auth']);

Route::get('/portofolio/student', function () {
    return view('portofolio.student');
})->middleware(['auth']);

Route::get('/criterias/{id}', [criteriaController::class, 'show']);

Route::resource('llos', lloController::class);

Route::get('/course-classes/new', function () {
    return view('course-classes/create');
})->middleware(['auth']);

Route::get('/portofolio/student', function () {
    return view('class-portofolio.student');
})->middleware(['auth']);

Route::get('/rubrics/{rubric}/criterias/{criteria}/criteria-levels/{criteria-level}/edit', function () {
    return view('criteria-levels/edit');
})->middleware(['auth']);

Route::get('/criteria-levels/{id}', [levelsController::class, 'show']);

Route::resource('rubrics', RubricsController::class)->middleware(['auth'])->only('show', 'create');

Route::resource('syllabi.ilos.clos', CourseLearningOutcomeController::class);

Route::get('/syllabi/create', function () {
    return view('syllabi.create');
})->middleware(['auth'])->name('syllabi.create');

Route::get('/course-classes/{courseclass}/assignments', function ($courseClass) {
    return view('assignments.show',['courseclass' => $courseClass]);
})->middleware(['auth']);

Route::get('/studentgrades/create/{id}', [StudentGradeController::class,'create'])->middleware(['auth']);

Route::get('/course-classes/join/{id}', [CourseClassController::class, 'show']);

Route::get('/class-portofolio/{courseclass}', [ClassPortofolioController::class, 'index']);

Route::get('/assignments/{assignments}/edit', function () {
    return view('assignments.edit');
})->middleware(['auth']);

Route::get('/Ilos/index', [IloController::class, 'index'])->middleware(['auth']);

Route::resource('course-classes.assignments', AssignmentController::class)->middleware(['auth']);

Route::resource('departments.study-programs', StudyProgramController::class)->middleware(['auth']);

Route::resource('syllabi.ilos', IloController::class);

require __DIR__ . '/auth.php';

