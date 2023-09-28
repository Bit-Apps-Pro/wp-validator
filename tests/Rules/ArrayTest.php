<?php

use BitApps\WPValidator\Rules\ArrayRule;

test('array', function () {

    $rule = new ArrayRule();

    expect(true)->toBe($rule->validate([1, 3, 4]));
    expect(true)->toBe($rule->validate(['name' => 'karim', 'age' => 21]));

});
