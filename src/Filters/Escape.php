<?php
namespace BitApps\WPValidator\Filters;

class Escape
{
    public function apply($value, $options = [])
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
