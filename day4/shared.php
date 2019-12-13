<?php
// https://adventofcode.com/2019/day/4

$input = '134564-585159';

$range = explode('-', $input);
$rangeMin = (int) $range[0];
$rangeMax = (int) $range[1];

$checkDecreasing = function (array $numbers) use (&$checkDecreasing) {
    if (count($numbers) < 2) {
        return false;
    }

    if ($numbers[0] <= $numbers[1]) {
        array_shift($numbers);
        return $checkDecreasing($numbers);
    }

    return true;
};