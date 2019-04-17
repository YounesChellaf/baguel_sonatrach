<?php

if(!function_exists('GenerateRandomPassword')){
  function GenerateRandomPassword(){
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@&é-_=$#';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }
}


if(!function_exists('logDescription')){
  function logDescription($key){
    switch ($key) {
      case 'created':
      return "Création";
      break;
      case 'updated':
      return "Modification";
      break;
      default:
      return "#";
      break;
    }
  }
}

?>
