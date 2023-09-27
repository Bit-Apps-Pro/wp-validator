<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class ArrayRule extends Rule
{
    public function validate($value)
    {
        return is_array($value);
    }
}
