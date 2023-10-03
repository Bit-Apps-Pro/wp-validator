<?php
namespace BitApps\WPValidator\Filters;

class Digit
{
    public function apply($value, $options = [])
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}
