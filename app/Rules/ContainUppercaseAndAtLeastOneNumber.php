<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContainUppercaseAndAtLeastOneNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Sử dụng regular expression để kiểm tra tối thiểu 1 chữ hoa và tối thiểu 1 số
        preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).+$/', $value, $matches);
        return count($matches) > 0;
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
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tối thiểu có một kí tự số và một kí tự chữ hoa';
    }
}
