<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class NullableRule extends Rule
{
    public function validate($value)
    {
        return true;
    }

    public function skipRule()
    {
        return false;
    }

    public function message(){
        return ''; 
    }
}
