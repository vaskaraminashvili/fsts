<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //    $check = \App\Models\User::find(1)->hasPermission('category_create');
    //    dd($check);
    return view('welcome');
});
