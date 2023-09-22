<?php

class NumericRule
{
    public static function validate($field, $value)
    {
        return is_numeric($value);
    }
}
