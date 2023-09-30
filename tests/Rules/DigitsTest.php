<?php

use BitApps\WPValidator\Rules\DigitsRule;

test('digit', function () {

    $rule = new DigitsRule();

    $paramKeys = ['digits'];
    $paramValues = [5];

    $rule->setParameterValues($paramKeys, $paramValues);

    expect(true)->toBe($rule->validate('23431'));
    expect(true)->toBe($rule->validate(23232));

});
