<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class UrlRule extends Rule
{
    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
}
