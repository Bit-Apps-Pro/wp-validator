<?php

use BitApps\WPValidator\Rules\JsonRule;

test('json', function () {

    $rule = new JsonRule();

    expect(true)->toBe($rule->validate('{"name": "Rahim", "age":21}'));
    expect(true)->toBe($rule->validate('{}'));

});
