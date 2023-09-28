<?php
namespace BitApps\WPValidator;

class CustomMessage
{
    private $field;
    private $ruleName;
    private $attributeLabel;
    private $paramValues;
    private $ruleParams;

    public $messages;

    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    public function setRuleName($ruleName)
    {
        $this->ruleName = $ruleName;
        return $this;
    }

    public function setAttributeLabel($attributeLabel)
    {
        $this->attributeLabel = $attributeLabel;
        return $this;
    }

    public function setParamValues($paramValues)
    {
        $this->paramValues = $paramValues;
        return $this;
    }

    public function setRuleParams($ruleParams)
    {
        $this->ruleParams = $ruleParams;
        return $this;
    }

    public function message()
    {
        if (isset($this->messages[$this->field][$this->ruleName])) {
            $message = str_replace(":attribute", $this->attributeLabel, $this->messages[$this->field][$this->ruleName]);
            foreach ($this->ruleParams as $key => $param) {
                if (isset($paramValues[$key])) {

                    $message = str_replace(":" . $param, $this->paramValues[$key], $message);
                }
            }
            return $message;
        }
    }
}
