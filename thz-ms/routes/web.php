<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', static function () {
    if (Auth::check()) {
        return redirect('home');
    }

    return view('landing');
});

Auth::routes();

Route::middleware('auth')
    ->group(static function () {
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('about', 'HomeController@about')->name('about');
        Route::resource('spectra', 'SpectrumController')->parameters([
            'spectra' => 'spectrum',
        ]);
        Route::resource('categories', 'CategoryController');
        Route::get('categories/{category}/spectra', 'CategoryController@spectra')->name('category.spectra');
    });
