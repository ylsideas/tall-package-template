<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'skeleton::dashboard')
    ->name('skeleton');
