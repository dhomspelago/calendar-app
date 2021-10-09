<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CurrentMonthRule implements Rule
{
    private $currentMonthYear;

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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->currentMonthYear = Carbon::now()->format('F Y');
        $date = Carbon::parse($value)->format('F Y');

        return $date === $this->currentMonthYear;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can only add events on ' . $this->currentMonthYear;
    }
}
