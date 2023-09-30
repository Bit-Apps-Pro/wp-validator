<?php

use BitApps\WPValidator\Rules\BetweenRule;

test('between', function () {

    $rule = new BetweenRule();
    $paramKeys = ['min', 'max'];
    $paramValues = [10, 15];
    $rule->setParameterValues($paramKeys, $paramValues);
    expect(true)->toBe($rule->validate(11));

});
