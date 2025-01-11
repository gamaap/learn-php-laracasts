<?php

use Core\Validator;

test('validates a string', function() {
  expect(Validator::string('foobar'))->toBeTrue();
  expect(Validator::string(false))->toBeFalse();
  expect(Validator::string(''))->toBeFalse();
});

test('validates a string with a minimum length', function() {
  expect(Validator::string('foobar', 20))->toBeFalse();
});

test('validates an email', function() {
  expect(Validator::email('foobar'))->toBeFalse();
  expect(Validator::email('gama@example.com'))->toBeTrue();
})->only();