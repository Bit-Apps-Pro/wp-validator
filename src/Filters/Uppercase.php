<?php
namespace BitApps\WPValidator\Filters;

class Uppercase
{
    public function apply($value, $options = [])
    {
        return mb_strtoupper($value);
    }
}
