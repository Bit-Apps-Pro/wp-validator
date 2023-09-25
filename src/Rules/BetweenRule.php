<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class BetweenRule extends Rule
{

    protected $message = "The :attribute must be between :min and :max";

    protected $params = ['min', 'max'];

    public function validate($value, $field = null, $params)
    {
        $min = $params[0];
        $max = $params[1];

        // $length = strlen($value);
        return $value >= $min && $value <= $max;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function message()
    {
        return $this->message;
    }

}
