<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('{anyroute}', 'AppController@index')
    ->where('anyroute', '.*')
    ->middleware('auth')
    ->name('home');
    