<?php

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
  

route::get('hema', function () {
    $name = 'Hema';
    return view('hema', compact('name'));
});

route::post('/hema', function () {

    $name = request('name'); 
    return view('hema', compact('name'));
});