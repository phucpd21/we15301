@extends('layout')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('contents')
    <div class="card my-4">
        <div class="card-header">
            <h4 class="card-heading">@yield('title')</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', ['product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm" value="{{ $product->price }}">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm" value="{{ $product->quantity }}">
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}"  {{ ($cate->id == $product->category_id) ? "selected" : '' }} >{{ $cate->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 border rounded p-1">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="border rounded"><img height="100px" src="{{ $product->image }}" alt="image"></div>

                <button type="submit" class="btn btn-primary my-2">Cập nhật ngay</button>
            </form>
        </div>
    </div>
@endsection
