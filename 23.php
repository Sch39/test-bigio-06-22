<?php
function chiper(string $input, int $distance): String
{
  $distance = $distance % 26;
  $arr_char = str_split(strtolower($input));
  $result = [];
  $arr_space = [];

  if ($distance < 0) {
    $distance += 26;
  }

  foreach ($arr_char as $idx => $char) {
    if ($char === " ") {
      array_push($result, " ");
    } else {
      array_push($result, chr(97 + (ord($char) - 97 + $distance) % 26));
    }
  }
  foreach ($arr_space as $space) {
  }
  return implode($result);
}

echo chiper('chiper', 2) . PHP_EOL; // ejkrgt
echo chiper('hello worldz', 3) . PHP_EOL; // khoor zruogc
