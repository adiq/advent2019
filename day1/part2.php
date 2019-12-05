<?php
// https://adventofcode.com/2019/day/1

$requiredFuelForMass = function (int $mass) : int {
    $requiredFuel = floor($mass/3)-2;
    
    return $requiredFuel > 0 ? $requiredFuel : 0;
};

$requiredFuelForFuel = function (int $fuel) use ($requiredFuelForMass) : int {
    while ($fuel > 0) {
        $fuel = $requiredFuelForMass($fuel);
        $requiredFuelTotal += $fuel;
    }

    return $requiredFuelTotal;
};

$file = fopen("input.txt","r");
  
$sum = 0;
while(!feof($file))  {
    $line = fgets($file);
    $requiredFuel = $requiredFuelForMass((int) $line);
    $requiredAdditionalFuel = $requiredFuelForFuel($requiredFuel);
    $sum += $requiredFuel + $requiredAdditionalFuel;
}

var_dump($sum);