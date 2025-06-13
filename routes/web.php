<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\WebController@index');
Route::get('/app', 'App\Http\Controllers\WebController@app');
Route::get('/output', 'App\Http\Controllers\WebController@output')->name('output');
