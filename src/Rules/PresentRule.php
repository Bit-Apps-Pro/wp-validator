<?php
namespace BitApps\WPValidator\Rules;

use BitApps\WPValidator\Rule;

class PresentRule extends Rule
{
    private $message = 'The field name must be present.';

    public function validate($value)
    {
        $attributeKey = $this->getInputDataContainer()->getAttributeKey();

        $data = $this->getInputDataContainer()->getData();

        if (isset($data[$attributeKey])) {
            return true;
        }

        return false;

    }

    public function message()
    {
        return $this->message;
    }
}
