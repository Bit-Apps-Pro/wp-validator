<?php

use BitApps\WPValidator\Rules\MinRule;

test('min', function () {

    $rule = new MinRule();
    $paramKeys = ['min'];
    $paramValues = [5];

    $rule->setParameterValues($paramKeys, $paramValues);

    expect(true)->toBe($rule->validate('1103d'));
    expect(true)->toBe($rule->validate('passd'));

});
