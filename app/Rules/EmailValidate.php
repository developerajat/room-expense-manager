<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailValidate implements Rule
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
    public function passes($attribute, $value)
    {
        $host_name = substr(strrchr($value, "@"), 1);
        return $host_name == 'yopmail.com';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please enter email ending with yopmail.com.';
    }
}
