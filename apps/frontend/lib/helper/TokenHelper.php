<?php

function generateToken($user) {

  // Generate token
  $token = md5(rand(0, 99999), sfConfig::get("csrf_secret"));

  // Get array from session
  $tokenarray = $user->getAttribute('tokenarray', array())->getRawValue();
  
  // Add new token if exists
  array_push($tokenarray, $token);

  // Set array back into session
  $user->setAttribute('tokenarray', $tokenarray);

  // Return token
  return $token;
  
}

?>
