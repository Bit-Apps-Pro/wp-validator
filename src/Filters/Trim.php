<?php
namespace BitApps\WPValidator\Filters;

class Trim
{
    public function apply($value, $options = [])
    {
        return is_string($value) ? trim($value) : $value;
    }
}
