<?php

class JsonRule
{
    public static function validate($field, $value)
    {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
