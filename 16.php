<?php

$exit = true;
$array_char = [];
while ($exit) {
  echo "tekan enter untuk melanjutkan atau $ untuk selesai" . PHP_EOL;
  echo "masukan huruf: ";
  $char = fgets(STDIN);
  echo ("yang dimasukkan: " . $char);
  if ($char[0] == "$") {
    break;
  }
  array_push($array_char, $char[0]);
}

for ($i = count($array_char) - 1; $i > 0; $i--) {
  array_push($array_char, $array_char[$i - 1]);
}
$result = implode(" ", $array_char);
var_dump($result);
// var_dump($array_char);
