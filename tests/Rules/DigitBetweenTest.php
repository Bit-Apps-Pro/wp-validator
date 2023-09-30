<?php

use BitApps\WPValidator\Rules\DigitBetweenRule;

test('digit-between', function () {

    $rule = new DigitBetweenRule();
    $paramKeys = ['min', 'max'];
    $paramValues = [5, 6];
    $rule->setParameterValues($paramKeys, $paramValues);
    expect(true)->toBe($rule->validate('12346'));
    expect(true)->toBe($rule->validate(12345));

});
