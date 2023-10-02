# WP Validator

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## Overview

The WP Validator is a robust PHP package designed to simplify the process of data validation and sanitization. It offers a versatile and user-friendly solution for developers to ensure that user input meets specific criteria and is secure against common vulnerabilities.


# Features
- **Data Validation:** Easily validate user inputs, form submissions, and API requests.
- **Custom Validation Rules:** Define your custom validation rules to suit your application's specific needs.
- **Error Messages:** Detailed error messages to help users understand validation failures.
- **Data Sanitization:** Optional data sanitization functions to clean and format data.
- **Flexible Usage:** Can be used in various PHP frameworks and applications.

## Example Usage
To use the wp-validator package for data validation in your PHP application, follow these steps:
### 1. Install the Package
Start by installing the WP Validator package using Composer:

```php
composer require bitapps/wp-validator
```

### 2. Initialize the Validator
Create an instance of the Validator class from the package:
```php
use BitApps\WPValidator\Validator;

$validator = new Validator;
```

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

### 4. Customize Error Messages (Optional)
If you need to customize error messages, you can use the $customMessages array. In this example, we leave it empty.
```php
$customMessages = [];
```
### 5. Map Attribute Names (Optional)
Map your field names to user-friendly labels using the $attributes array:
```php
$attributes = [
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email',
];
```
### 6. Perform Validation
Execute the validation using the validate method:
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
## Available Validation Rules
WP Validator provides a comprehensive set of validation rules to suit your needs. Here's a list of available rules:

1. `accepted`
2. `array`
3. `between`
4. `date`
5. `digit_between:min,max`
6. `digits:value`
7. `email`
8. `integer`
9. `ip`
10. `ipv4`
11. `ipv6`
12. `json`
13. `lowercase`
14. `mac_address`
15. `max:value`
16. `min:value`
17. `nullable`
18. `numeric`
19. `required`
20. `same:field`
21. `size:value`
22. `string`
23. `uppercase`
24. `url`

# Contributing
We welcome contributions from the community. If you find a bug or have a feature suggestion, please open an issue or submit a pull request.

# License
This package is open-source and available under the MIT License.