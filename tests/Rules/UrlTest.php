<?php

use BitApps\WPValidator\Rules\UrlRule;

test('url', function () {

    $rule = new UrlRule();

    expect(true)->toBe($rule->validate('https://www.github.com'));
    expect(true)->toBe($rule->validate('http://www.wikipedia.org'));
    expect(true)->toBe($rule->validate('https://www.wikipedia.org/wiki/URL_encoding?format=json'));
});
