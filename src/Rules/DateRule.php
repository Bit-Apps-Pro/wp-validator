<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class DateRule extends Rule
{
    public function validate($value)
    {
        return strtotime($value) !== false;
    }
}
