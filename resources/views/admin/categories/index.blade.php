@extends('layout')

@section('title')
    Danh sách danh mục sản phẩm
@endsection

@section('contents')
    <h1>Danh sách danh mục sản phẩm</h1>
    <div class="row">
        <div class="col-6">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add new</a>
        </div>
    </div>

    <table class="table-striped table">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                <tr>
                    <td>{{ $cate->id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $cate->id]) }}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        {{-- button trigger model --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete_category_{{ $cate->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete_category_{{ $cate->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tắt</button>
                                        <form action="{{ route('admin.categories.delete', ['category' => $cate->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Xóa</button>
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

@endsection
