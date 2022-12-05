<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentPlanController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLearningOutcomeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CriteriaLevelController;
use App\Http\Controllers\IntendedLearningOutcomeController;
use App\Http\Controllers\LearningPlanController;
use App\Http\Controllers\LessonLearningOutcomeController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\SyllabusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\UserController;

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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UserController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('syllabi', SyllabusController::class);
    Route::resource('rubrics', RubricController::class)->middleware(['roles:admin,teacher']);
    Route::resource('classes', CourseClassController::class);
    Route::resource('student-grades', StudentGradeController::class);

    Route::scopeBindings()->group(function () {
        Route::resource('faculties.departments', DepartmentController::class);
        Route::resource('faculties.departments.study-programs', StudyProgramController::class);
        Route::resource('syllabi.ilos', IntendedLearningOutcomeController::class)->middleware(['roles:admin,teacher']);
        Route::resource('syllabi.ilos.clos', CourseLearningOutcomeController::class)->middleware(['roles:teacher']);
        Route::resource('syllabi.ilos.clos.llos', LessonLearningOutcomeController::class);
        Route::resource('syllabi.learning-plans', LearningPlanController::class);
        Route::resource('syllabi.assignment-plans', AssignmentPlanController::class);
        Route::resource('rubrics.criterias', CriteriaController::class);
        Route::resource('rubrics.criterias.criteria-levels', CriteriaLevelController::class);
        Route::resource('course-classes.assignments', AssignmentController::class);
    });
});

require __DIR__ . '/auth.php';
