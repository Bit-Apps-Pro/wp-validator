<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class IPRule extends Rule
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}
