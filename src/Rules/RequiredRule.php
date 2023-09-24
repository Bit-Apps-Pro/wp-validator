<?php
namespace BitApps\WPValidator\Rules;

class RequiredRule
{

    protected $message = 'The :attribute field is required';

    protected static $attribute;

    public static function validate($value, $field = null)
    {
        static::$attribute = $field;
        // if (is_string($value)) {
        //     return !mb_strlen(trim($value), 'UTF-8') > 0;
        // }
        // if (is_array($value)) {
        //     return !count($value) > 0;
        // }
        // return is_null($value);
        return !empty($value);
    }

    public function message()
    {
        return str_replace(":attribute", static::$attribute, $this->message);
    }
}
