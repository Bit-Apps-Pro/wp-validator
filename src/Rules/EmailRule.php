<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class EmailRule extends Rule
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
