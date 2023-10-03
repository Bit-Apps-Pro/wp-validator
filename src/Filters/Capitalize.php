<?php
namespace BitApps\WPValidator\Filters;

class Capitalize
{
    public function apply($value, $options = [])
    {
        return ucwords(strtolower($value));
    }
}
