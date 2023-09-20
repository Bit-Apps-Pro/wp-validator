<?php
namespace BitApps\ValidatorSanitizer\Rules;

class Required
{

    protected $message = 'The :attribute is required';

    public function check($value)
    {

        if (is_string($value)) {
            return mb_strlen(trim($value), 'UTF-8') > 0;
        }
        if (is_array($value)) {
            return count($value) > 0;
        }
        return !is_null($value);
    }

    public function message($message = null)
    {
        return "";
    }

}
