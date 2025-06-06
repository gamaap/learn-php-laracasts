<?php

use Core\Validator;

it('validates a string', function() {
  expect(Validator::string('foobar'))->toBeTrue();
  expect(Validator::string(false))->toBeFalse();
  expect(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function() {
  expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function() {
  expect(Validator::email('sfsdsdsds'))->toBeFalse();
  expect(Validator::email('gama@example.com'))->toBeTrue();
});