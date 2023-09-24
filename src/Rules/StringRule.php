<?php

namespace BitApps\WPValidator\Rules;

class StringRule
{
    protected $message = "The :attribute field should be string";
    protected static $attribute;

    public static function validate($value, $field = null)
    {
        static::$attribute = $field;
        return is_string($value);
    }

    public function message()
    {
        return str_replace(":attribute", static::$attribute, $this->message);
    }
}
