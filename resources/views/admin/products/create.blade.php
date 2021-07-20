@extends('layout')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('contents')
    <div class="card my-4">
        <div class="card-header">
            <h4 class="card-heading">@yield('title')</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
                </div>

                <div class="form-group mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm">
                </div>

                <div class="form-group mb-3">
                    <label>Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 border rounded p-1">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary my-2">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
