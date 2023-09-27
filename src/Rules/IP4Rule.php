<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class IP4Rule extends Rule
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
}
