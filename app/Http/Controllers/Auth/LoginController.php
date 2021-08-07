<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function getLoginForm() {
        return view('auth.login');
    }
    public function login(LoginRequest $request) {
        $data = $request->only([
            'email',
            'password'
        ]);

        $result = Auth::attempt($data);

        if($result == false) {
            return back()->with('err', 'Sai tk or Mk');
        } else {
            $user = Auth::user();
            return redirect()->route('admin.users.index');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('admin.users.index');
    }
}
