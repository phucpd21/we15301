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



// _____PRODUCTS_____

// _____CATEGORIES_____

// Route::get('/admin/categories', function () {
//     $categories = Category::all();
//     return view('admin.categories.index', compact('categories'));
// })->name('admin.categories.index');

// Route::get('admin/categories/create', function () {
//     return view('admin.categories.create');
// })->name('admin.categories.create');

// Route::post('admin/categories/store', function () {
//     $data = Request()->except('_token');
//     if (!Category::create($data)) {
//         return abort(403, 'Thêm mới không thành công');
//     }
//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.store');

// Route::get('admin/categories/edit/{id}', function ($id) {
// })->name('admin.categories.edit');

// Route::post('admin/categories/update/{id}', function ($id) {
// })->name('admin.categories.update');

// Route::post('admin/categories/delete/{id}', function ($id) {
//     $category = Category::find($id);
//     if (empty($category)) {
//         return abort(403, 'Dữ liệu có vấn đề');
//     }

//     if (!$category->delete()) {
//         return abort(403, 'Xử lý không thành công');
//     };
//     return redirect()->route('admin.categories.index');
// })->name('admin.categories.delete');
