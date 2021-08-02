<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RulePasswordOnUpdate implements Rule
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

    public $isEmpty = TRUE;
    public $isValiLength = TRUE;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->isEmpty = empty($value) == true;
        $this->isValiLength = (strlen($value) >= 8) && (strlen($value) <= 50);
        $result = $this->isEmpty || (!$this->isEmpty && $this->isValiLength);
        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Độ dài mật khẩu phải từ 8 đến 50 ký tự';
    }
}
