<?php
namespace BitApps\WPValidator\Filters;

class Lowercase
{
    public function apply($value, $options = [])
    {
        return mb_strtolower($value, 'UTF-8');
    }
}
