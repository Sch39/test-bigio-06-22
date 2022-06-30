<?php

function reverse(string $input): string
{
  $len = strlen($input);

  if ($len == 1) {
    return $input;
  } else {
    $len--;

    return reverse(substr($input, 1, $len)) . substr($input, 0, 1);
  }
}

var_dump(reverse('hello'));
var_dump(reverse('a'));
