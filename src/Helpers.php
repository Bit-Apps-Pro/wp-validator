<?php

namespace BitApps\WPValidator;

trait Helpers
{
    protected function isEmpty($val)
    {
        if (empty($val) && !in_array($val, ['0', 0, 0.0, false], true)) {
            return true;
        }

        return false;
    }

    protected function getValueLength($value)
    {
        if (is_int($value) || is_float($value)) {
            $value = $value;
        } elseif (is_string($value)) {
            $value = mb_strlen($value, 'UTF-8');
        } elseif (is_array($value)) {
            $value = count($value);
        } else {
            return false;
        }

        return $value;

    }
}
