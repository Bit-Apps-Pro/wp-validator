<?php
namespace BitApps\WPValidator\Rules;

class NullableRule
{
    public function validate($value = null)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }
}
