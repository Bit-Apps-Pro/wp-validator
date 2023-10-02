<?php

use BitApps\WPValidator\Rules\SizeRule;

test('size', function () {

    $rule = new SizeRule();
    $paramKeys = ['size'];
    $paramValues = [5];

    $rule->setParameterValues($paramKeys, $paramValues);

    expect(true)->toBe($rule->validate(5));
    expect(true)->toBe($rule->validate('12345'));
    expect(true)->toBe($rule->validate([1, 2, 3, 4, 5]));

});
