<?php

namespace BitApps\WPValidator;

class ErrorMessageBag
{
    protected $messages = [];

    public function addError($field, $message)
    {
        $this->messages[$field][] = $message;
    }

    public function getMessages($field = null)
    {
        if ($field === null) {
            return $this->messages;
        }

        return $this->messages[$field] ?? [];
    }

    public function hasErrors($field = null)
    {
        if ($field === null) {
            return !empty($this->messages);
        }

        return isset($this->messages[$field]) && !empty($this->messages[$field]);
    }
}
