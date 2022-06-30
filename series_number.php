<?php

$n = 5;
$arr_buff = [];

for ($a = 1; $a <= $n; $a++) {

  for ($b = 1; $b <= $a; $b++) {
    array_push($arr_buff, "$b");
  }

  for ($c = $n; $c >= $a; $c--) {
    array_push($arr_buff, "  ");
  }

  for ($d = $a; $d > 0; $d--) {
    array_push($arr_buff, "$d");
  }
  array_push($arr_buff, PHP_EOL);
}

for ($i = $n - 1; $i > 0; $i--) {
  for ($j = 1; $j <= $i; $j++) {
    array_push($arr_buff, "$j");
  }
  for ($k = $n; $k >= $i; $k--) {
    array_push($arr_buff, "  ");
  }

  for ($l = $i; $l > 0; $l--) {
    array_push($arr_buff, "$l");
  }
  array_push($arr_buff, PHP_EOL);
}

echo (implode($arr_buff));
