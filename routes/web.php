<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramsController;

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

Route::get('/departments/{department}/study-programs', [StudyProgramController::class, 'index']);

require __DIR__.'/auth.php';
