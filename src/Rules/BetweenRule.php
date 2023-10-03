<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class BetweenRule extends Rule
{

    protected $message = "The :attribute must be between :min and :max";

    protected $requireParameters = ['min', 'max'];

    public function validate($value)
    {
        $this->checkRequiredParameter($this->requireParameters);

        $min = (int) $this->getParameter('min');
        $max = (int) $this->getParameter('max');

        if (filter_var($value, FILTER_VALIDATE_INT)) {
            return $value >= $min && $value <= $max;
        } else if (is_array($value)) {
            return count($value) >= $min && count($value) <= $max;
        } else {
            return strlen($value) >= $min && strlen($value) <= $max;
        }
    }

    public function getParamKeys()
    {
        return $this->requireParameters;
    }

    public function message()
    {
        return $this->message;
    }

}
