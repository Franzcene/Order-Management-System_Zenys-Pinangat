<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value matches the phone number pattern
        if (!preg_match('/^(09\d{9}|639\d{9})$/', $value)) {
            $fail("The {$attribute} must be a valid phone number.");
        }
    }
}
