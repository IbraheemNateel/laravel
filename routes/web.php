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
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
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


Route::post('delete/{id}', function($id){
DB::table('tasks')->where('id' , $id ) -> delete();
return redirect()->back();
});

Route::post('edit/{id}', function($id){
    $task = DB::table('tasks')->where('id' , $id ) -> first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

Route::post('update/{id}', function($id){
    $TASK_name = $_POST['name'];
    DB::table('tasks')->where('id' , $id ) -> update([
        'name' => $TASK_name,
        'updated_at' => now(),
    ]);
    return redirect('/tasks');
});