<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DoerController;
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

Route::prefix('tasks')->group(function(){ 

	Route::get('/', [TaskController::class, 'index']);
	Route::get('/search/{search?}', [TaskController::class, 'index']);
	Route::get('/addTask', [TaskController::class, 'addTask']);
	Route::get('/editTask/{id}', [TaskController::class, 'viewTask']);

	Route::post('/update', [TaskController::class, 'updateTask']);
	Route::post('/delete/{id}', [TaskController::class, 'deleteTask']);
	Route::post('/save', [TaskController::class, 'saveTask']);
	Route::post('/search', [TaskController::class, 'searchTask']);
});

Route::prefix('doers')->group(function(){
	Route::get('/', [DoerController::class, 'index']);
	Route::get('/addDoer', [DoerController::class, 'addDoer']);
	Route::get('/editDoer/{id}', [DoerController::class, 'viewDoer']);

	Route::post('/update', [DoerController::class, 'updateDoer']);
	Route::post('/delete/{id}', [DoerController::class, 'deleteDoer']);
	Route::post('/save', [DoerController::class, 'saveDoer']);
});
