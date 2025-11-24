<?php
namespace BitApps\WPValidator;

class ErrorBag
{
    use Helpers;
    protected $errors = [];

    public function addError($role, $customMessages): void
    {
        $attributeKey = $role->getInputDataContainer()->getAttributeKey();

        $roleName = $role->getRuleName();

        $paramValues = $role->getParamValues();

        $defaultPlaceholders = [
            'attribute' => $role->getInputDataContainer()->getAttributeLabel(),
            'value'     => $role->getInputDataContainer()->getAttributeValue(),
        ];

        $placeholders = array_merge($paramValues, $defaultPlaceholders);

        $message = null;

        if (is_string($roleName)) {
            // Try exact match first
            $exactKey = $attributeKey . '.' . $roleName;
            if (isset($customMessages[$exactKey])) {
                $message = $this->replacePlaceholders($placeholders, $customMessages[$exactKey]);
            } else {
                // Try wildcard pattern match for nested validation
                $wildcardKey = $this->convertToWildcardPattern($attributeKey) . '.' . $roleName;
                if (isset($customMessages[$wildcardKey])) {
                    $message = $this->replacePlaceholders($placeholders, $customMessages[$wildcardKey]);
                } elseif (isset($customMessages[$roleName])) {
                    $message = $this->replacePlaceholders($placeholders, $customMessages[$roleName]);
                }
            }
        }

        if ($message === null) {
            $message = $this->replacePlaceholders($placeholders, $role->message());
        }
        $this->errors[$attributeKey][] = $message;
    }

    private function replacePlaceholders(array $placeholders, $message)
    {
        foreach ($placeholders as $key => $placeholder) {
            if (isset($placeholders[$key])) {

                if (is_object($placeholder)) {
                    $placeholder = (array) $placeholder;
                }

                if (is_array($placeholder)) {
                    $placeholder = implode(',', $placeholder);
                }
                $message = str_replace(":" . $key, $placeholder, $message);

            }
        }
        return $message;
    }

    private function convertToWildcardPattern($attributeKey)
    {
        $parts = explode('.', $attributeKey);
        foreach ($parts as &$part) {
            // Convert numeric indices to wildcards
            if (is_numeric($part)) {
                $part = '*';
            }
        }
        return implode('.', $parts);
    }

    public function getErrors($field = null)
    {
        return $this->errors;
    }

    public function hasErrors($field = null): bool
    {
        if ($field === null) {
            return ! empty($this->errors);
        }

        return isset($this->errors[$field]) && ! empty($this->errors[$field]);
    }
}
