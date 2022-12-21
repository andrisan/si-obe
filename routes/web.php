<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentPlanController;
use App\Http\Controllers\AssignmentPlanTasksController;
use App\Http\Controllers\ClassPortofolioController;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

// Authenticated and Verified
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::singleton('profile', ProfileController::class)->creatable();

    Route::group(['middleware' => ['profileCompleted']], function () {
        Route::get('home', [DashboardController::class, 'index'])->name('dashboard');

        // Admin role
        Route::group(['middleware' => ['roles:admin']], function (){
            Route::resource('users', UserController::class);
            Route::resource('faculties', FacultyController::class)->except('show');
            Route::resource('courses', CourseController::class);

            Route::scopeBindings()->group(function () {
                Route::resource('faculties.departments', DepartmentController::class)->except('show');
                Route::resource('faculties.departments.study-programs', StudyProgramController::class)->except('show');
            });
        });

        // Teacher or admin roles
        Route::group(['middleware' => ['roles:admin,teacher']], function (){
            Route::resource('syllabi', SyllabusController::class);
            Route::resource('rubrics', RubricController::class);

            Route::get('student-grades/edit', [StudentGradeController::class, 'edit']);
            Route::get('student-grades/create', [StudentGradeController::class, 'create']);
            Route::resource('student-grades', StudentGradeController::class, ['except' => [
                'edit'
            ]]);
            Route::get('class-portofolio/{courseClass}', [ClassPortofolioController::class, 'index'])->name('class-portofolio.index');
            Route::get('class-portofolio/{courseClass}/students', [ClassPortofolioController::class, 'student'])->name('class-portofolio.student');

            Route::scopeBindings()->group(function () {
                Route::resource('syllabi.ilos', IntendedLearningOutcomeController::class)->except(['show', 'index']);
                Route::resource('syllabi.clos', CourseLearningOutcomeController::class)->except(['show', 'index']);
                Route::resource('syllabi.llos', LessonLearningOutcomeController::class)->except(['show', 'index']);
                Route::resource('syllabi.learning-plans', LearningPlanController::class);
                Route::resource('syllabi.assignment-plans', AssignmentPlanController::class)->except(['show', 'index']);
                Route::resource('syllabi.assignment-plans.assignment-plan-tasks', AssignmentPlanTasksController::class)->except(['show', 'index']);
                Route::resource('rubrics.criterias', CriteriaController::class);
                Route::resource('rubrics.criterias.criteria-levels', CriteriaLevelController::class);
            });
        });

        // Student
        Route::group(['middleware' => ['roles:student']], function (){
            Route::post('classes/join/process', [CourseClassController::class, 'join'])->name('classes.join');
            Route::get('classes/join',[CourseClassController::class, 'show_join'])->name('classes.show_join');
            Route::get('profile/grade', [ProfileController::class, 'grade'])->name('profile.grade');
        });

        Route::resource('classes', CourseClassController::class);

        Route::scopeBindings()->group(function (){
            Route::resource('classes.assignments', AssignmentController::class);
        });
    });
});

require __DIR__ . '/auth.php';
