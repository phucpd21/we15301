<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
        // (N + 1) queries problems
        // => (n + 1) queries -> 2 queries

        // Trước khi gọi tới quan hệ trong vòng for
        // Phải dùng EAGER LOADING

        // SELECT * FROM users;
        $listUser = User::all();
        // SELECT * FROM invoices WHERE user_id IN (...)
        // $listUser->load(['invoices']);

        // dd($listUser->first()->invoices);

        return view('admin.users.index', ['listUser' => $listUser]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        User::create($data);

        if($request->ajax() == true) {
            return response()->json([
                'status' => 200,
                'message' =>'ok'
            ]);
        }
        // return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user, UpdateRequest $request)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function delete(User $user)
    {
        if(!$user->delete($user)) {
            abort(403, 'Xóa người dùng không thành công');
        }
        return redirect()->route('admin.users.index');
    }



}
