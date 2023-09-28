<?php
namespace BitApps\WPValidator;

class InputDataContainer
{
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

    public function getAttributeValue($key=null)
    {
        if(isset($this->data[$key])){
            return $this->data[$key];
        }

        if(isset($this->data[$this->attributeKey])){
            return $this->data[$this->attributeKey];
        }
        return null;
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
