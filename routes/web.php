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
// Route::group([
//     'prefix' => 'admin',
//     'namespace' => 'Admin',
//     'as' => 'admin.'
// ], function () {
//     Route::get('users', 'UserController@index')->name('users.index');
//     Route::get('users/create', 'UserController@create')->name('users.create');
//     Route::post('users/store', 'UserController@store')->name('users.store');
//     Route::get('users/edit/{id}', 'UserController@edit')->name('users.edit');
//     Route::post('users/update/{id}', 'UserController@update')->name('users.update');
//     Route::post('users/delete/{id}', 'UserController@delete')->name('users.delete');
// });

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('users.index');
            Route::get('create', 'UserController@create')->name('users.create');
            Route::post('store', 'UserController@store')->name('users.store');
            Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
            Route::post('update/{id}', 'UserController@update')->name('users.update');
            Route::post('delete/{id}', 'UserController@delete')->name('users.delete');
        });
});

// _____PRODUCTS_____
Route::get('/admin/products', function () {
    // $products = Product::with('categories')->get();
    $products = Product::with('categories')->get();
    $categories = Category::all();
    return view('admin.products.index', compact('products', 'categories'));
})->name('admin.products.index');

Route::get('admin/products/create', function () {
    $categories = Category::all();
    return view('admin.products.create', compact('categories'));
})->name('admin.products.create');

Route::post('admin/products/store', function () {
    $data = request()->except('_token');
    $data['image'] = 'linkanh';
    Product::create($data);
    return redirect()->route('admin.products.index');
})->name('admin.products.store');

Route::get('admin/products/edit/{id}', function ($id) {
    $product = Product::find($id);
    if (empty($product)) {
        abort(403, 'Sản phẩm không tồn tại');
        exit();
    }
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
})->name('admin.products.edit');

Route::post('admin/products/update/{id}', function ($id) {
    $data = request()->except('_token');
    $data['image'] = 'link-anh';
    $product = Product::find($id);
    if (empty($product)) {
        abort(403, 'Sản phẩm không tồn tại, hãy kiểm tra lại');
    }
    if (!$product->update($data)) {
        abort(403, 'Cập nhật sản phẩm không thành công');
    }
    return redirect()->route('admin.products.index');
})->name('admin.products.update');

Route::post('admin/products/delete/{id}', function ($id) {

    $product = Product::find($id);
    if (empty($product)) {
        return abort(403, 'Xóa không thành công');
    }
    if (!$product->delete()) {
        return abort(403, 'Xóa không thành công');
    };
    return redirect()->route('admin.products.index');
})->name('admin.products.delete');

// _____CATEGORIES_____

Route::get('/admin/categories', function () {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
})->name('admin.categories.index');

Route::get('admin/categories/create', function () {
    return view('admin.categories.create');
})->name('admin.categories.create');

Route::post('admin/categories/store', function () {
    $data = Request()->except('_token');
    if (!Category::create($data)) {
        return abort(403, 'Thêm mới không thành công');
    }
    return redirect()->route('admin.categories.index');
})->name('admin.categories.store');

Route::get('admin/categories/edit/{id}', function ($id) {
})->name('admin.categories.edit');

Route::post('admin/categories/update/{id}', function ($id) {
})->name('admin.categories.update');

Route::post('admin/categories/delete/{id}', function ($id) {
    $category = Category::find($id);
    if (empty($category)) {
        return abort(403, 'Dữ liệu có vấn đề');
    }

    if (!$category->delete()) {
        return abort(403, 'Xử lý không thành công');
    };
    return redirect()->route('admin.categories.index');
})->name('admin.categories.delete');
