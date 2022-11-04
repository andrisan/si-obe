<?php

use App\Http\Controllers\criteriaController;
use Illuminate\Support\Facades\Route;

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
Route::get('/criteria/edit', function () {
    return view('welcome');
});
Route:: resource('criteria',criteriaController::class);

Route::get('/criteria', function () {
    return view('criteria.create');
});




Route::get('/criteria/edit', function () {
    return view('criteria.create');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
