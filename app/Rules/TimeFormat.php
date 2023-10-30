<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Verificar si el valor es una hora válida en formato HH:MM
        return preg_match('/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/', $value);
    }

    public function message()
    {
        return 'El campo debe ser una hora válida en formato HH:MM.';
    }
}
