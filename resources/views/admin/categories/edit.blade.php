@extends('layout')

@section('title')
    Cập nhật danh mục sản phẩm
@endsection

@section('contents')

    <div class="col-6">
        <div class="card my-5">
            <div class="card-header">
                Cập nhật danh mục sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
