<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class DigitsRule extends Rule
{
    public function validate($value)
    {

        $length = (int) $this->getParameter('length') ? 0 : 0;

        return !preg_match('/[^0-9]/', $value) && strlen((string) $value) === $length;

    }
}
