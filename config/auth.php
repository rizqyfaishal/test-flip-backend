<?php
  require_once('./env.php');

  return [
    'auth' => [
      'secret' => env('AUTH_SECRET_KEY', 'HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41') 
    ]
  ];
