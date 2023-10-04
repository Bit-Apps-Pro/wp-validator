# WP Validator

Validate and sanitize form inputs and API requests with a PHP library inspired by Laravel, designed specifically for WordPress.

[![Latest Stable Version](https://poser.pugx.org/bitapps/wp-validator/v/stable)](https://packagist.org/packages/bitapps/wp-validator) [![Total Downloads](https://poser.pugx.org/bitapps/wp-validator/downloads)](https://packagist.org/packages/bitapps/wp-validator) [![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Overview

WP Validator is a comprehensive PHP package, inspired by Laravel, that simplifies the process of data validation and sanitization for WordPress. It provides a versatile and user-friendly solution for developers to ensure that user input meets specific criteria and is secure against common vulnerabilities.

## Features

- **Data Validation:** Easily validate user inputs, form submissions, and API requests.
- **Custom Validation Rules:** Define your custom validation rules to meet your application's specific needs.
- **Error Messages:** Detailed error messages to assist users in understanding validation failures.
- **Data Sanitization:** Optional data sanitization functions for cleaning and formatting data.

## Example Usage

To use the wp-validator package for data validation in your PHP application, follow these steps:

### 1. Install the Package

Begin by installing the WP Validator package using Composer:

```bash
composer require bitapps/wp-validator
```

### 2. Initialize the Validator

Create an instance of the Validator class from the package:

```php
use BitApps\WPValidator\Validator;

$validator = new Validator;
```

Public methods that can be used with `$validator`, refer: [Validator Instance Methods](#validator-instance-methods).

### 3. Define Your Data and Validation Rules

Prepare the data you want to validate and define the validation rules. Here's an example:

```php
$data = [
    'first_name' => 'John',
    'last_name' => '',
    'email' => 'email@example',
    'password' => '##112233',
    'confirm_password' => '##112233',
];

$rules = [
    'first_name' => ['required', 'string'],
    'last_name' => ['required', 'string'],
    'email' => ['required', 'email'],
    'password' => ['required', 'min:8'],
    'confirm_password' => ['required', 'min:6', 'same:password'],
];
```

Explore all available validation rules and their usage in the [Available Validation Rules](#available-validation-rules) section.

### 4. Customize Error Messages (Optional)

If you need to customize error messages, you can use the `$customMessages` array. In this example, we leave it empty.

```php
$customMessages = [];
```

Learn more about customizing error messages in the [Customizing Error Messages](#customizing-error-messages) section.

### 5. Map Attribute Names (Optional)

Map your field names to user-friendly labels using the `$attributes` array:

```php
$attributes = [
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email',
];
```

### 6. Perform Validation

Execute the validation using the `make` method:

```php
$validation = $validator->make($data, $rules, $customMessages, $attributes);
```

### 7. Handle Validation Results

Check if validation fails and, if so, print out the validation errors:

```php
if ($validation->fails()) {
    echo "<pre>";
    echo print_r($validation->errors(), true);
    echo "</pre>";
} else {
    echo "Success!";
}
```

#### Validator Instance Methods

##### `make($data: array, $rules: array[, $customMessages?: array, $attributes?: array])`

This method runs the validations of `$data` based on given `$rules`. Optionally, if you pass `$customMessages` and `$attributes` it will make the error messages (*if any*)  based on that.

##### `fails(): boolean`

This method will return true or false based on the validation status. If it returns true, that means the validator has found errors in data and you can get those errors by `errors()` method.

##### `errors(): array`

This method will return the error messages (*if any*) based on the format of passed `$data` array in `make()` method.

#### Available Validation Rules

WP Validator provides a comprehensive set of validation rules to suit your needs. Here's a list of available rules:

1. `accepted`: Checks if the value is one of the following: `'yes'`, `'on'`, `'1'`, `1`, `'true'`, `true`.
2. `array`: Checks if the given value is an array.
3. `between:min,max`: Checks if the value falls within the range of `:min` and `:max` (inclusive). The value can be a `string (length)`, `numeric (value)`, or `array (count of elements)`.
4. `date`: Checks if the given value is a valid date.
5. `digit_between:min,max`: Checks if the number of digits in the numeric value falls within the range of `:min` and `:max` (inclusive).
6. `digits:value`: Checks if the number of digits in the numeric value is exactly same as `:value`.
7. `email`: Checks if the field value is a valid email address.
8. `integer`: Checks if the value is an integer number.
9. `ip`: Checks if the value is a valid IP (IPv4 & IPv6) address.
10. `ipv4`: Checks if the value is a valid IPv4 address.
11. `ipv6`: Checks if the value is a valid IPv6 address.
12. `json`: Checks if the value is a valid JSON string.
13. `lowercase`: Checks if the string value consists of all lowercase letters.
14. `mac_address`: Checks if the given value is a valid MAC address.
15. `max:value`: Checks if the value is less than or equal to `:value`. The value can be a `string (length)`, `numeric (value)`, or `array (count of elements)`.
16. `min:value`: Checks if the value is greater than or equal to `:value`. The value can be a `string (length)`, `numeric (value)`, or `array (count of elements)`.
17. `nullable`: Makes the value optional but respects other validation rules if specified.
18. `numeric`: Checks if the value is a valid real number.
19. `required`: Checks if the value is present and not empty.
20. `same:field`: Checks if the value is equal to the value of the specified `:field`.
21. `size:value`: Checks if the value is exactly same as `:value`. The value can be a `string (length)`, `numeric (value)`, or `array (count of elements)`.
22. `string`: Checks if the given value is a string.
23. `uppercase`: Checks if the string value consists of all uppercase letters.
24. `url`: Checks if the value is a valid URL.

#### Customizing Error Messages

WP Validator provides default error messages based on validation rules. For added flexibility, you can change these error messages globally or even for specific fields and validation rules:

```php
$customMessages = [
    'required' => ':attribute is missing',
    'string' => ':attribute cannot contain any numerics',
    'email' => 'Email is not valid',
    'between' => 'The :attribute must be given between :min & :max'
];
```

Now, for each validation rule, it will return the custom error messages you have set.

**Note:** `:attribute` refers to the field it's currently validating, acting as a placeholder. You can also use parameters of validation rules such as `:value`, `:min`, `:max` as placeholders.

If you want more flexibility and wish to customize error messages individually for each validation rule and field, you can also achieve that:

```php
$customMessages = [
    'first_name' => [
        'required' => 'First name must be present',
        'string' => 'You cannot include anything except letters in the first name'
    ],
    'email' => [
        'email' => 'The provided email is not valid'
    ],
];
```

If you use any other validation rules that you didn't mention in the Custom Messages array, WP Validator will follow the default error message provided by us.

# Contributing

We welcome contributions from the community. If you find a bug or have a feature suggestion, please open an issue or submit a pull request.

# License

This package is open-source and available under the MIT License.
