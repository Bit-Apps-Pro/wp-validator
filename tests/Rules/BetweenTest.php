<?php

use BitApps\WPValidator\Rules\BetweenRule;

test('between', function () {

    $rule = new BetweenRule();
    $paramKeys = ['min', 'max'];
    $paramValues = [1, 5];
    $rule->setParameterValues($paramKeys, $paramValues);
    expect(true)->toBe($rule->validate('abcde'));
    expect(true)->toBe($rule->validate(3));
    expect(true)->toBe($rule->validate([1, 2, 3, 4, 5]));

});
