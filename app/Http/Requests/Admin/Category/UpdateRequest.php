<?php

namespace App\Http\Requests\Admin\Category;

use App\Rules\RuleNameUniqueOnUpdate;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            "name" => ["required","min:2","max:50", new RuleNameUniqueOnUpdate('categories')]
        ];
    }

    public function messages() {
        return [
            "name.required" => ":attribute không được để trống",
            "name.min" => ":attribute phải có 2 ký tự trở lên",
            "name.max" => ":attribute không được quá 50 ký tự",
        ];
    }
    public function attributes()
    {
        return [
            'name' =>  "Tên danh mục sản phẩm"
        ];
    }
}
