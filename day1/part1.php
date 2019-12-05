<?php
// https://adventofcode.com/2019/day/1

$requiredFuel = function (int $mass) : int {
    return floor($mass/3)-2;
};

$file = fopen("input.txt","r");
  
$sum = 0;
while(!feof($file))  {
    $line = fgets($file);
    $sum += $requiredFuel((int) $line);
}

var_dump($sum);