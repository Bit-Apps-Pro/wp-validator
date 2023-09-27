<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class RequiredRule extends Rule
{

    protected $message = 'The :attribute field is required';

    protected static $attribute;

    public function validate($value)
    {
        return !empty($value);
    }

    public function message($attributeLabel)
    {
        return str_replace(":attribute", $attributeLabel, $this->message);
        // return $this->message();
    }
}
