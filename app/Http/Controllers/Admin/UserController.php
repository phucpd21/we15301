<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::all();
        return view('admin.users.index', ['listUser' => $listUser]);
    }

    public function show($id)
    {
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function store()
    {
        $data = request()->except('_token');
        $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $result = User::create($data);
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update($id)
    {
        $user = User::find($id);
        $data = request()->except('_token');
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }
}
