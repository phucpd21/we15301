<?php

namespace App\Http\Requests\Admin\Category;

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
        return [
            "name" => "required|min:2|max:50|unique:categories,name"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên danh mục sản phẩm không được để trống",
            "name.min" => "Tên danh mục sản phẩm phải có 2 ký tự trở lên",
            "name.max" => "Tên danh mục sản phẩm không được quá 50 ký tự",
            "name.unique" => "Tên danh mục sản phẩm đã tồn tại"
        ];
    }

}
