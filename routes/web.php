<?php

use Illuminate\Support\Facades\Route;

Route::group(['domain' => 'https://bgn.test'], function() {
    Route::get('/', function () {
        return redirect()->route('app.login');
    });
});