<?php
namespace BitApps\WPValidator\Rules;

class IP6Rule
{
    private $message = "The :attribute must be a valid IPv6 address";

    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }

    public function message()
    {
        $this->message;
    }
}
