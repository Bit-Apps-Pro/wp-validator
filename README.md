# php-validator-sanitizer
This PHP package provides a comprehensive solution for input validation and sanitation. It allows developers to easily validate user input against various rules and sanitize it to prevent security vulnerabilities.

# Validation rules First Release Plan

1.Required
2.Email
3.Integer
4.Nuequired: The field must be present and not empty.

string: The field must be a string.

numeric: The field must be numeric.

integer: The field must be an integer.

boolean: The field must be a boolean value.

date: The field must be a valid date format.

email: The field must be a valid email address.

url: The field must be a valid URL.

accepted: The field must be "yes," "on," "1," or "true." This is often used for checkbox inputs.

confirmed: The field must have a matching field of "fieldname_confirmation." This is often used for password confirmation fields.

min: The field must have a minimum length or minimum numeric value.

max: The field must not exceed a maximum length or maximum numeric value.

in: The field's value must be included in a given list of values.

not_in: The field's value must not be included in a given list of values.

unique: The field's value must be unique in a specified database table.

exists: The field's value must exist in another database table.

nullable: The field is allowed to be null.

regex: The field's value must match a specified regular expression.

date_format: The field's value must match a specified date format.

size: The field's value must have a specific size.

image: The file upload must be an image (jpeg, png, gif, etc.).

mimes: The file upload must have a specified MIME type.

sometimes: The field is validated only if it is present in the input data.

required_if: The field is required if another field has a certain value.

required_unless: The field is required unless another field has a certain value.

required_with: The field is required if any of the specified other fields are present.

required_with_all: The field is required if all of the specified other fields are present.

required_without: The field is required if none of the specified other fields are present.

required_without_all: The field is required if none of the specified other fields are presenmeric

0.String
1.Required
2.Email
3.Integer
4.Numeric
5.Min
6.Max
7.Between
8.URL
9.IP
10.IP4
11.IP6
12.Array
13.Accepted
14.Date
15.Digits
16.Json
17.Lowercase
18.Uppercase
19.Nullable
20.Min
21.Max
22.Image
23.Mimes
24.Size
<!-- #   $baseValidator = [
#             'required'                  => new Rules\Required,
#             'required_if'               => new Rules\RequiredIf,
#             'required_unless'           => new Rules\RequiredUnless,
#             'required_with'             => new Rules\RequiredWith,
#             'required_without'          => new Rules\RequiredWithout,
#             'required_with_all'         => new Rules\RequiredWithAll,
#             'required_without_all'      => new Rules\RequiredWithoutAll,
#             'email'                     => new Rules\Email,
#             'alpha'                     => new Rules\Alpha,
#             'numeric'                   => new Rules\Numeric,
#             'alpha_num'                 => new Rules\AlphaNum,
#             'alpha_dash'                => new Rules\AlphaDash,
#             'alpha_spaces'              => new Rules\AlphaSpaces,
#             'in'                        => new Rules\In,
#             'not_in'                    => new Rules\NotIn,
#             'min'                       => new Rules\Min,
#             'max'                       => new Rules\Max,
#             'between'                   => new Rules\Between,
#             'url'                       => new Rules\Url,
#             'integer'                   => new Rules\Integer,
#             'boolean'                   => new Rules\Boolean,
#             'ip'                        => new Rules\Ip,
#             'ipv4'                      => new Rules\Ipv4,
#             'ipv6'                      => new Rules\Ipv6,
#             'extension'                 => new Rules\Extension,
#             'array'                     => new Rules\TypeArray,
#             'same'                      => new Rules\Same,
#             'regex'                     => new Rules\Regex,
#             'date'                      => new Rules\Date,
#             'accepted'                  => new Rules\Accepted,
#             'present'                   => new Rules\Present,
#             'different'                 => new Rules\Different,
#             'uploaded_file'             => new Rules\UploadedFile,
#             'mimes'                     => new Rules\Mimes,
#             'callback'                  => new Rules\Callback,
#             'before'                    => new Rules\Before,
#             'after'                     => new Rules\After,
#             'lowercase'                 => new Rules\Lowercase,
#             'uppercase'                 => new Rules\Uppercase,
#             'json'                      => new Rules\Json,
#             'digits'                    => new Rules\Digits,
#             'digits_between'            => new Rules\DigitsBetween,
#             'defaults'                  => new Rules\Defaults,
#             'default'                   => new Rules\Defaults, // alias of defaults
#             ''                  => new Rules\Nullable,
#         ];

#     } -->