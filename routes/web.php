<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
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
  

route::get('hema', function () {
    $name = 'Hema';
    return view('hema', compact('name'));
});

route::post('/hema', function () {

    $name = request('name'); 
    return view('hema', compact('name'));
});

route::get('/tasks', [TaskController::class, 'index']);


route::post('create', [TaskController::class, 'create']);


Route::post('delete/{id}', [TaskController::class, 'destroy']);

Route::post('edit/{id}', [TaskController::class, 'edit']);

  
Route::post('update/{id}', [TaskController::class, 'update']);

Route::get('app', function () {
    return view('layout/app');
});


route::get('users', [UsersController::class, 'index']);

route::post('create', [UsersController::class, 'create']);
route::post('delete/{id}', [UsersController::class, 'destroy']);
Route::post('edit/{id}', [UsersController::class, 'edit']);

  
Route::post('update/{id}', [UsersController::class, 'update']);