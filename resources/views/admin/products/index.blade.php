@extends('layout')

@section('title')
    Danh sách sản phẩm
@endsection

@section('contents')

    <div class="card my-4 ">
        <div class="card-header">
            <h4 class="card-heading">
                @yield('title')
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-end">Thêm mới sản phẩm</a>
            </h4>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td> <img src="{{ asset($product->image) }}"></td>
                            <td>
                                @if ($product->categories)
                                    {{ $product->categories->name }}
                                @endif
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', ['id'=> $product->id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $product->id }}">
                                    Delete
                                </button>

                                <div class="modal fade" id="exampleModal_{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Xác nhận xóa
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <form action="{{ route('admin.products.delete', ['id' => $product->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
