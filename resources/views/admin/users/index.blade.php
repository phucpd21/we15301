@extends('layout')

@section('title')
    Title nè
@endsection

@section('contents')
    <h1>Content</h1>

    @if (!empty($listUser))

        <div class="row">
            <div class="col-6">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create</a>
            </div>
            <div class="col-6"></div>
        </div>

        <table class="table-striped table">
            <thead class="thead-dark">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Adress</td>
                    <td>Count invoices</td>
                    <td>Gender</td>
                    <td>Role</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUser as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', ['user' => $user->id]) }}">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->invoices->count() }}</td>
                        <td>{{ $user->gender == config('common.user.gender.male') ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ $user->role == config('common.user.role.user') ? 'User' : 'Admin' }}</td>

                        <td>
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            {{-- <button class="btn btn-danger" data-target>Delete</button> --}}

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#confirm_delete_{{ $user->id }}" value="Delete">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Xóa bản ghi này
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST"
                                                action="{{ route('admin.users.delete', ['user' => $user->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Không có dữ liệu</h3>
    @endif

@endsection
