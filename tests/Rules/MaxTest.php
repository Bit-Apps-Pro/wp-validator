<?php

use BitApps\WPValidator\Rules\MaxRule;

test('max', function () {

    $rule = new MaxRule();

    $paramKeys = ['max'];
    $paramValues = [5];

    expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate('110'));
    expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate('passw'));
    // expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate([4, 5, 6]));

});
