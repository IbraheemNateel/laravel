<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

route::get('/tasks', function () {
    
    return view('tasks');
});

route::post('create', function () {
    $TASK_name = $_POST['name'];
    DB::table('tasks')->insert([
        'name' => $TASK_name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect('/tasks');
});