@extends('layout')
@section('title')
    Edit user page
@endsection

@section('contents')
    <div class="col-6">
        <form action="{{ route('admin.users.update', ['user'=>$user->id]) }}" method="post" class="my-5">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" value="{{ $user->email }}">
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
                <input class="form-control" type="text" name="address" value="{{ $user->address }}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                    <option value="0" {{ $user->gender == 0 ? 'selected' : '' }} >Male</option>
                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }} >Female</option>
                    <option value="2" {{ $user->gender == 2 ? 'selected' : '' }} >Other</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role">
                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }} >User</option>
                    <option value="1" {{ $user->role == 1 ? 'selected' : '' }} >Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>


@endsection
