<?php

namespace BitApps\WPValidator;

class Sanitizer
{
    use SanitizationMethods;

    public function applySanitizationRules($inputData, $sanitizationRules)
    {
        foreach ($sanitizationRules as $field => $rules) {

            if (isset($inputData[$field])) {
                foreach ($rules as $rule) {
                    $sanitizationMethod = 'sanitize' . str_replace(' ', '', ucwords(str_replace('_', ' ', $rule)));

                    if (method_exists($this, $sanitizationMethod)) {
                        $inputData[$field] = $this->$sanitizationMethod($inputData[$field]);
                    }
                }
            }

        }

        return $inputData;
    }

}
