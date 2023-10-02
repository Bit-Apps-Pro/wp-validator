<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class LowercaseRule extends Rule
{
    private $message = "The :attribute must be in lowercase";

    public function validate($value)
    {
        return $value === strtolower($value);
    }

    public function message()
    {
        return $this->message;
    }
}
