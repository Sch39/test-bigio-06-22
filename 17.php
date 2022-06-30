<?php

function drawStars(): string
{
  echo "masukan jumlah: ";
  $n = trim(fgets(STDIN));
  $n = intval($n);
  echo PHP_EOL;
  $arr_buff = [];

  for ($a = 1; $a <= $n; $a++) {
    for ($b = 1; $b <= $a; $b++) {
      array_push($arr_buff, " ");
    }
    for ($c = $n; $c >= $a; $c--) {
      array_push($arr_buff, "* ");
    }
    array_push($arr_buff, PHP_EOL);
  }

  for ($i = $n; $i > 0; $i--) {
    for ($j = 1; $j <= $i; $j++) {
      array_push($arr_buff, " ");
    }
    for ($k = $n; $k >= $i; $k--) {
      array_push($arr_buff, "* ");
    }
    array_push($arr_buff, PHP_EOL);
  }

  return implode($arr_buff);
}

echo (drawStars());
