<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class UppercaseRule extends Rule
{
    public function validate($value)
    {
        return $value === strtoupper($value);
    }
}
