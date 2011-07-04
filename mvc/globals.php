<?

// Yes, globals functions. It seems to be the PHP way for certain things.

function camelize($string) 
{ 
  $string = str_replace(array('-', '_'), ' ', $string); 
  $string = ucwords($string); 
  $string = str_replace(' ', '', $string);  

  return $string; 
} 
