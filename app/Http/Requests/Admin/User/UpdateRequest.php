<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RuleEmailUniqueOnUpdate;
use App\Rules\RulePasswordOnUpdate;
class UpdateRequest extends FormRequest
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
        // dd($this->request);
        return [
            'name' => 'required|max:30',
            'email' => ['required','email', new RuleEmailUniqueOnUpdate() ],
            'password' => [ new RulePasswordOnUpdate() ],
            'address' => 'required',
            'role' => 'required|in:'. implode(',' ,config('common.user.role')),
            'gender' => 'required|in:'. implode(',' ,config('common.user.gender')),
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',

            'name.max' => 'Tên không được quá 30 ký tự',
            'role.in' => 'Quyền hạn không hợp lệ, hãy kiểm tra lại',
            'gender.in' => 'Giới tính không hợp lệ, hãy kiểm tra lại',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'role' => 'Quyền hạn',
            'gender' => 'Giới tính',
        ];
    }
}
