<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
        $categories = Category::all();

        if(!empty($categories)) {
            $array_cate = [];
            foreach ($categories as $cate) {
                $array_cate[] = $cate->id;
            }
            $array_cate_to_string = implode(',' ,$array_cate);
        } else {
            $array_cate_to_string = [];
        }
        return [
            "name" => "required|min:3|max:50|unique:products,name",
            "price" => "required|min:1",
            "quantity" => "required|min:1",
            "category_id" => "required|in:" . $array_cate_to_string
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute không được để trống",
            "name.unique" => "Tên sản phẩm đã tồn tại",
            "price.min" => "Giá sản phẩm phải lớn hơn 0",
            "quantity.min" => "Số lượng sản phẩm phải lớn hơn 0",
            "category_id.in" => "Không được chọn danh mục sản phẩm không tồn tại"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Tên sản phẩm",
            "price" => "Giá sản phẩm",
            "quantity" => "Số lượng sản phẩm",
            "category_id" => "Danh mục sản phẩm",
        ];
    }
}
