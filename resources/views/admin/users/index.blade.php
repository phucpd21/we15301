@extends('layout')

@section('title')
    Title nè
@endsection

@section('contents')
    <h1>Content</h1>

    @if (!empty($listUser))

        <div class="row">
            <div class="col-6">
                <button class="btn btn-success" role="button" data-toggle="modal" data-target="#model_create">New</button>

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
                                <form action="{{ route('admin.users.store') }}" method="post" class="my-5" id="form_create">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Adress</label>
                                        <input class="form-control" type="text" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                            <option value="2">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Đóng</button>

                            </div>
                        </div>
                    </div>
                </div>
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
            const data = {
                _token,
                name,
                email,
                address,
                password,
                gender,
                role
            };
            url = 'http://127.0.0.1:8000/admin/users/store'
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
                // console.log(data);
                // if(data.status == 200) {
                //     console.log('Thành công')
                // }
            })
        });
    </script>
@endpush

