<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class IntegerRule extends Rule
{
    protected $message = "The :attribute field should be integer";

    protected static $attribute;

    public function validate($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function message()
    {
        return str_replace(":attribute", static::$attribute, $this->message);
    }

}
