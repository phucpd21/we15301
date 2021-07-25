<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        if (!Category::create($request->all())) {
            return abort(403, 'Thêm mới không thành công');
        }
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {
        if(empty($category)) {
            return abort(403, 'Không tìm thấy danh mục sản phẩm');
        }
        if(!$category->update($request->all())) {
            return abort(403, 'Cập nhật không thành công');
        }
        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $category)
    {
        if (empty($category)) {
            return abort(403, 'Dữ liệu có vấn đề');
        }

        if (!$category->delete()) {
            return abort(403, 'Xử lý không thành công');
        };
        return redirect()->route('admin.categories.index');
    }
}
