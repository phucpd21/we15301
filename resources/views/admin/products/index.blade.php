@extends('layout')

@section('title')
    Danh sách sản phẩm
@endsection

@section('contents')

    <div class="card my-4 ">
        <div class="card-header">
            <h4 class="card-heading">
                @yield('title')
                {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-end">Thêm mới sản phẩm</a> --}}
                <button class="btn btn-success" role="button" data-toggle="modal" data-target="#model_create">Create</button>

                <div class="modal fade" id="model_create" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" id="form_create">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Đóng</button>

                            </div>
                        </div>
                    </div>
                </div>

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
                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                    class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirm_delete_{{ $product->id }}" value="delete">
                                    Delete
                                </button>

                                {{-- <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#confirm_delete_{{ $user->id }}" value="Delete">Delete</button> --}}

                                <div class="modal fade" id="confirm_delete_{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Xác nhận xóa
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <form
                                                    action="{{ route('admin.products.delete', ['product' => $product->id]) }}"
                                                    method="POST">
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

@push('script')
    <script>
        $('#form_create').on('submit', function(event) {
            event.preventDefault();
            let name = $("#form_create input[name='name']").val();
            let email = $("#form_create input[name='email']").val();
            let address = $("#form_create input[name='address']").val();
            let password = $("#form_create input[name='password']").val();
            let gender = $("#form_create select[name='gender']").val();
            let role = $("#form_create select[name='role']").val();
            let _token = $("#form_create input[name='_token']").val();
            const = data = {
                _token,
                name,
                email,
                address,
                password,
                gender,
                role
            };
            fetch(url, {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    "X-CSRF-Token": _token,
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.status == 200) {
                    console.log('Thành công')
                })
            })
        });
    </script>
@endpush
