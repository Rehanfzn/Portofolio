<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'profile' => config('portfolio.profile'),
        'navigation' => config('portfolio.navigation'),
        'skills' => config('portfolio.skills'),
        'experience' => config('portfolio.experience'),
        'projects' => config('portfolio.projects'),
        'certificates' => config('portfolio.certificates'),
        'social' => config('portfolio.social'),
    ]);
});
