<?php
namespace BitApps\WPValidator\Rules;

class NullableRule
{
    public function validate($value)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }
}
