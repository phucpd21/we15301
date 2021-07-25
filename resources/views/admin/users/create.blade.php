@extends('layout')
@section('title')
    Create user page
@endsection

@section('contents')
    <div class="col-6">

        <form action="{{ route('admin.users.store') }}" method="post" class="my-5">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Adress</label>
                <input class="form-control" type="text" name="address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    <option value="2">Other</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>


@endsection
