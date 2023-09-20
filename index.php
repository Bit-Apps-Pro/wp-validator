<?php

use BitApps\ValidatorSanitizer\Validator;

require 'vendor/autoload.php';

$validator = new Validator;

$data = [
    'name' => '',
    'age' => 21,
];

$rules = [
    'name' => ['required'],
    'age' => ['required'],
];
$validate = $validator->validate($data, $rules);
if (!$validate) {
    echo 'aaa';
    $errors = $validator->errors();
    echo "<pre>";
    echo print_r($errors, true);
    echo "<pre>";
} else {
    // var_dump($validate);
}


class StringRule {
    public static function validate($field, $value) {
        return is_string($value);
    }
}

class RequiredRule {
    public static function validate($field, $value) {
        return !empty($value);
    }
}

class EmailRule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

class IntegerRule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }
}

class NumericRule {
    public static function validate($field, $value) {
        return is_numeric($value);
    }
}

class MinRule {
    public static function validate($field, $value, $min) {
        return strlen($value) >= $min;
    }
}

class MaxRule {
    public static function validate($field, $value, $max) {
        return strlen($value) <= $max;
    }
}

class BetweenRule {
    public static function validate($field, $value, $min, $max) {
        $length = strlen($value);
        return $length >= $min && $length <= $max;
    }
}

class URLRule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
}

class IPRule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}

class IP4Rule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
}

class IP6Rule {
    public static function validate($field, $value) {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
}

class ArrayRule {
    public static function validate($field, $value) {
        return is_array($value);
    }
}

class AcceptedRule {
    public static function validate($field, $value) {
        $accepted = ['yes', 'on', '1', 1, true];
        return in_array($value, $accepted, true);
    }
}

class DateRule {
    public static function validate($field, $value) {
        return strtotime($value) !== false;
    }
}

class DigitsRule {
    public static function validate($field, $value) {
        return ctype_digit($value);
    }
}

class JsonRule {
    public static function validate($field, $value) {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}

class LowercaseRule {
    public static function validate($field, $value) {
        return $value === strtolower($value);
    }
}

class UppercaseRule {
    public static function validate($field, $value) {
        return $value === strtoupper($value);
    }
}

class NullableRule {
    public static function validate($field, $value) {
        return true; // No validation needed, always passes.
    }
}

class MinLengthRule {
    public static function validate($field, $value, $minLength) {
        return strlen($value) >= $minLength;
    }
}

class MaxLengthRule {
    public static function validate($field, $value, $maxLength) {
        return strlen($value) <= $maxLength;
    }
}

class ImageRule {
    public static function validate($field, $value) {
        // You can implement image validation logic here.
        // Example: Check if the value is a valid image file.
        // For simplicity, this example always returns true.
        return true;
    }
}

class MimesRule {
    public static function validate($field, $value, $allowedMimes) {
        // You can implement MIME type validation logic here.
        // Example: Check if the value has one of the allowed MIME types.
        // For simplicity, this example always returns true.
        return true;
    }
}

class SizeRule {
    public static function validate($field, $value, $size) {
        // You can implement size validation logic here.
        // Example: Check if the size of the value is within the specified limit.
        // For simplicity, this example always returns true.
        return true;
    }
}
