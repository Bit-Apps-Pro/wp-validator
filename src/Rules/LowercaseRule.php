<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class LowercaseRule extends Rule
{
    public function validate($value)
    {
        return $value === strtolower($value);
    }
}
