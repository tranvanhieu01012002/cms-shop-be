<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;   

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/set-redis',function(){
    return Redis::set("key",10);
});
Route::get('/get-redis',function(){
    return Redis::get("key");
});