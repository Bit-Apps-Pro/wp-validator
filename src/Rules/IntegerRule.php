<?php
namespace BitApps\ValidatorSanitizer\Rules;

class IntegerRule
{
    protected $message = "The :attribute field should be integer";

    protected static $attribute;

    public static function validate($value, $field = null)
    {
        static::$attribute = $field;
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function message()
    {
        return str_replace(":attribute", static::$attribute, $this->message);
    }

}
