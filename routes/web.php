<?php

use Illuminate\Support\Facades\Route;

Route::get('/register-form', function () {
    return view('register-form');
});

Route::get('/user-list', function () {
    return view('user-list');
});

Route::get('/to-do', function () {
    return view('to-do');
});
