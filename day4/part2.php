<?php
// https://adventofcode.com/2019/day/4

require 'shared.php';

$checkDoubled = function (array $numbers) {
    $grouped = array_count_values($numbers);
    $hasLargeGroup = false;
    $hasDouble = false;
    foreach ($grouped as $value => $count) {
        if ($count === 2) {
            $hasDouble = true;
        }
    } 
    
    return $hasDouble;
};

$sum = 0;
for ($i = $rangeMin; $i <= $rangeMax; $i++) {
    $numbers = str_split($i);
    $isNumberDoubled = $checkDoubled($numbers);
    $isDecreasing = $checkDecreasing($numbers);

    if ($isNumberDoubled && !$isDecreasing) {
        $sum++;
    }
}

var_dump('possible combinations', $sum);