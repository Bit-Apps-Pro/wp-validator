<?php
namespace BitApps\WPValidator\Rules;

class Cast
{
    public function apply($value, $options = [])
    {
        $targetType = isset($options[0]) ? $options[0] : null;

        switch ($targetType) {
            case 'int':
            case 'integer':
                return (int) $value;
            case 'real':
            case 'float':
            case 'double':
                return (float) $value;
            case 'string':
                return (string) $value;
            case 'bool':
            case 'boolean':
                return (bool) $value;
            case 'object':
                return is_array($value) ? (object) $value : json_decode($value, false);
            case 'array':
                return json_decode($value, true);
            case 'collection':
                return is_array($value) ? $value : json_decode($value, true);

            default:
                throw new \InvalidArgumentException("Invalid casting format: {$targetType}.");
        }
    }
}
