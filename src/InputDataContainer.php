<?php
namespace BitApps\WPValidator;

class InputDataContainer
{
    use Helpers;
    private $data = [];
    private $attributeKey;
    private $attributeLabel;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function setAttributeKey($key)
    {
        $this->attributeKey = $key;
    }

    public function getAttributeKey()
    {
        return $this->attributeKey;
    }

    public function getAttributeValue($key = null)
    {
        $keys = explode('.', trim($this->attributeKey, '[]'));
        $data = $this->data;
        if (is_array($keys)) {
            $data = $this->getValueFromPath($keys, $data);
        } else {
            if (isset($data[$key])) {
                return $data[$key];
            } elseif (isset($data[$this->attributeKey])) {
                return $data[$this->attributeKey];
            } else {
                return null;
            }
        }
        return $data;

    }

    public function setAttributeLabel($value)
    {
        $this->attributeLabel = $value;
    }

    public function getAttributeLabel()
    {
        return $this->attributeLabel;
    }

    public function getData()
    {
        return $this->data;
    }

}
