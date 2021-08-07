@extends('layout')

@section('contents')
    <div class="container">
        <div class="col-10 offset-1">
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="row">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="row">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="mt-4 mb-5">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                @if (session()->has('err'))
                    <div class="text-danger">{{ session()->get('err') }}</div>
                @endif
            </form>
        </div>
    </div>
@endsection

