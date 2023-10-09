<?php

use BitApps\WPValidator\Rules\ArrayOfStringsRule;

test('array-of-string', function () {

    $rule = new ArrayOfStringsRule();
    expect(true)->toBe($rule->validate(['a', 'b', 'c']));

});
