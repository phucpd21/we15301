<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('admin.users.index');
});

// _____USERS_____
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create');
        Route::get('/{user}', 'UserController@show')->name('show')->where(['id' => '[0-9]+']);
        Route::post('store', 'UserController@store')->name('store');
        Route::get('edit/{user}', 'UserController@edit')->name('edit')->where(['id' => '[0-9]+']);
        Route::post('update/{user}', 'UserController@update')->name('update')->where(['id' => '[0-9]+']);
        Route::post('delete/{user}', 'UserController@delete')->name('delete')->where(['id' => '[0-9]+']);
    });

    // _____PRODUCTS_____
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/{product}', 'ProductController@create')->name('show')->where(['id' => '[0-9]+']);;
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/edit/{product}', 'ProductController@edit')->name('edit')->where(['id' => '[0-9]+']);;
        Route::post('/update/{product}', 'ProductController@update')->name('update')->where(['id' => '[0-9]+']);;
        Route::post('/delete/{product}', 'ProductController@delete')->name('delete')->where(['id' => '[0-9]+']);;
    });
    // _____CATEGORIES_____
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/{category}', 'CategoryController@create')->name('show')->where(['id' => '[0-9]+']);;
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{category}', 'CategoryController@edit')->name('edit')->where(['id' => '[0-9]+']);;
        Route::post('/update/{category}', 'CategoryController@update')->name('update')->where(['id' => '[0-9]+']);;
        Route::post('/delete/{category}', 'CategoryController@delete')->name('delete')->where(['id' => '[0-9]+']);;
    });
});

