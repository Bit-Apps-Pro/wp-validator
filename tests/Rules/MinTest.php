<?php

use BitApps\WPValidator\Rules\MinRule;

test('min', function () {

    $rule = new MinRule();

    $paramKeys = ['min'];
    $paramValues = [5];

    expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate('1103d'));
    expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate('passd'));
    // expect(true)->toBe($rule->validate(59));
    // expect(true)->toBe($rule->validate('1234'));
    // expect(true)->toBe($rule->validate([4, 5, 6]));

});
