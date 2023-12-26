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

    public function setNestedElement($data, $keys, $value)
    {
        $reference = &$data;
        foreach ($keys as $key) {
            if (is_object($reference) && property_exists($reference, $key)) {
                $reference->$key = [];
                $reference = &$reference->{$key};
            } else {
                if (is_array($reference) && !array_key_exists($key, $reference)) {
                    $reference[$key] = [];
                    $reference = &$reference[$key];
                }
            }

        }

        $reference = $value;
        unset($reference);

        return $data;
    }

    public function getValueFromPath($keys, $data)
    {
        $counter = 0;
        while (count($keys) > $counter) {
            $path = $keys[$counter];
            if (is_object($data)) {
                $data = (array) $data;
            }
            if (isset($data[$path])) {
                $data = $data[$path];
            } else {
                return null;
            }
            $counter++;
        }

        return $data;
    }
}
