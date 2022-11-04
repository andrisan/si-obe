<?php

use App\Http\Controllers\RubricsController;
use App\Http\Controllers\cloController;
use App\Http\Controllers\levelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lloController;

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

Route::get('/rubrics/{rubric}/criterias/{criteria}/edit', function () {
    return view('criterias.edit');
});

Route::resource('clos', cloController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('llos', lloController::class);

Route::get('/course-classes/new', function () {
    return view('course-classes/create');
})->middleware(['auth']);

Route::get('/rubrics/{rubric}/criterias/{criteria}/criteria-levels/{criteria-level}/edit', function () {
    return view('criteria-levels/edit');
})->middleware(['auth']);

Route::get('/criteria-levels/{id}', [levelsController::class, 'show']);

Route ::resource('rubrics', RubricsController::class)->middleware(['auth'])->only('show', 'create');

require __DIR__.'/auth.php';
?>