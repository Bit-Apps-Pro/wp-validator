<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class NumericRule extends Rule
{
    public function validate($value)
    {
        return is_numeric($value);
    }
}
