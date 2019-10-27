<?php

function env($envKey, $defaultValue) {
  if(isset($_ENV[$envKey])) {
    return $_ENV[$envKey];
  } else {
    return $defaultValue;
  }
}

