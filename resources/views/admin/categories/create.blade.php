@extends('layout')

@section('title')
    Tạo mới danh mục sản phẩm
@endsection

@section('contents')

    <div class="col-6">
        <div class="card my-5">
            <div class="card-header">
                Thêm mới danh mục sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Thêm vào</button>
                </form>
            </div>
        </div>
    </div>
@endsection
