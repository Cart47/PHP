<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_zpF9jprElg1qYxa6REqMZRG8",
  "publishable_key" => "pk_test_dfUZf9734pcqmpwGR7tfLS8t"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
