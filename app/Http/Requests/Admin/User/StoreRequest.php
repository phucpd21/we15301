<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd(implode(config('common.user.gender') . ''));
        return [
            'name' => 'required|max:30',
            'password' => 'required|min:8|max:50',
            'email' => 'required| email|unique:users,email',
            'address' => 'required',
            'role' => 'required|in:'. implode(',' ,config('common.user.role')),
            'gender' => 'required|in:'. implode(',' ,config('common.user.gender')),
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute không được để trống',

            'name.max' => 'Tên không được quá 30 ký tự',
            'password.max' => 'Mật khẩu không được quá 50 ký tự',
            'password.min' => 'Mật khẩu phải 8 ký tự trở lên',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'role.in' => 'Quyền hạn không hợp lệ, hãy kiểm tra lại',
            'gender.in' => 'Giới tính không hợp lệ, hãy kiểm tra lại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => "Mật khẩu",
            'address' => "Địa chỉ",
            'role' => "Quyền hạn",
            'gender' => "Giới tính",
        ];
    }
}
