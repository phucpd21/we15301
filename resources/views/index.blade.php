@extends('layout')

@section('title')
    Title nè
@endsection

@section('contents')
    <h1>Content</h1>

    <table class="table-striped table">
        <thead class="thead-dark">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Adress</td>
                <td>Gender</td>
                <td>Role</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUser as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
