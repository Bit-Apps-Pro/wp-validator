<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class NullableRule extends Rule
{

    private $message = '';

    public function validate($value)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }

    public function message()
    {
        return $this->message;
    }
}
