<?php

namespace App\Rules;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class RuleNameUniqueOnUpdate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $table_name = '';

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        switch($this->table_name) {
            case 'products':
                $new_name = request()->product->name;
                if($new_name == $value) {
                    return true;
                }
                if(Product::where('name',$value)->count() > 0) {
                    return false;
                }
                return true; break;
            ;

            case 'categories':
                if(request()->category->name == $value) {
                    return true;
                }
                if(Category::where('name', $value)->count() > 0) {
                    return false;
                } return true;
            break;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch ($this->table_name) {
            case 'products':
                return ':attribute đã tồn tại'; break;
            case 'categories':
                return ':attribute đã tồn tại'; break;
        }
    }
}
