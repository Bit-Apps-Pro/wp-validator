<?php

use BitApps\WPValidator\Rules\BetweenRule;

test('between', function () {

    $rule = new BetweenRule();
    $paramKeys = ['min', 'max'];
    $paramValues = [10, 15];
    expect(true)->toBe($rule->setParameterValues($paramKeys, $paramValues)->validate(11));

});
