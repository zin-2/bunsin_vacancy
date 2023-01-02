<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SalaryRule implements Rule
{
    protected $max_salary;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($max_salary)
    {
        //
        $this->max_salary = $max_salary;
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
        return $value <= $this->max_salary;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'must be between 0 and maximum salary.';
    }
}
