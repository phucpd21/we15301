<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $request = $request->all();
        $request['image'] = 'linkanh';
        Product::create($request);
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        if (empty($product)) {
            abort(403, 'Sản phẩm không tồn tại');
            exit();
        }
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $request = $request->all();
        if (empty($product)) {
            abort(403, 'Sản phẩm không tồn tại, hãy kiểm tra lại');
        }
        $request['image'] = 'link-anh';
        if (!$product->update($request)) {
            abort(403, 'Cập nhật sản phẩm không thành công');
        }
        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product)
    {
        if (empty($product)) {
            return abort(403, 'Xóa không thành công');
        }
        if (!$product->delete()) {
            return abort(403, 'Xóa không thành công');
        };
        return redirect()->route('admin.products.index');
    }
}
