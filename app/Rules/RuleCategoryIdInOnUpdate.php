<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class RuleCategoryIdInOnUpdate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public $categories_id;
    public function passes($attribute, $value)
    {

        Category::all()->each(function($category) {
            $this->categories_id[] = $category->id;
        });
        if(in_array($value, $this->categories_id)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Danh mục sản phẩm không hợp lệ';
    }
}
