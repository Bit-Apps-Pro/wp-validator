<?php
namespace BitApps\WPValidator\Rules;

class IP6Rule
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
}
