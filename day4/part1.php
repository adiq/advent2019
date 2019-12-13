<?php
// https://adventofcode.com/2019/day/4

require 'shared.php';

$checkDoubled = function (array $numbers) use (&$checkDoubled) {
    if (count($numbers) < 2) {
        return false;
    }

    if ($numbers[0] != $numbers[1]) {
        array_shift($numbers);
        return $checkDoubled($numbers);
    }

    return true;
};

$sum = 0;
for ($i = $rangeMin; $i <= $rangeMax; $i++) {
    $numbers = str_split($i);
    // always in range of input
    // always 6 digits in this range
    $isNumberDoubled = $checkDoubled($numbers);
    $isDecreasing = $checkDecreasing($numbers);

    if ($isNumberDoubled && !$isDecreasing) {
        $sum++;
    }
}

var_dump('possible combinations', $sum);