<?php

namespace BitApps\WPValidator;

class Sanitizer
{
    use SanitizerAttributes;

    function sanitize($data, $sanitizeRules)
    {
        foreach ($sanitizeRules as $field => $rules) {

            if (isset($data[$field])) {
                foreach ($rules as $rule) {
                    $method = 'sanitize' . str_replace(' ', '', ucwords(str_replace('_', ' ', $rule)));

                    if (method_exists($this, $method)) {
                        $data[$field] = $this->$method($data[$field]);
                    }
                }
            }

        }

        return $data;
    }

}
