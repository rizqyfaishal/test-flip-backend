<?php 
  require_once('./env.php');
  
  return [
    'database'  => [
      'driver'  => env('DATABASE_ENGINE', 'sqlite'),
      'name'    => env('DATABASE_NAME', 'db.sqlite'),
      // 'user'    => env('DATABASE_USER', 'test_flip'),
      // 'password' => env('DATABASE_PASSWORD', 'test_flip'),
      // 'port'    => env('DATABASE_PORT', 3306),
    ]
  ];
