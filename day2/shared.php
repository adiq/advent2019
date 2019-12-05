<?php
// https://adventofcode.com/2019/day/2

$file = @file_get_contents("input.txt");
$codes = explode(',', $file);

$getPointingValue = function (int $index) use (&$codes) {
    return $codes[$codes[$index]];
};

// assumes -1 as exit code
$interpretOpcodeOnIndex = function (int $index) use (&$codes, $getPointingValue) {
    switch ($codes[$index]) {
        case 1:
            $codes[$codes[$index+3]] = $getPointingValue($index+1) + $getPointingValue($index+2);
        break;
        case 2:
            $codes[$codes[$index+3]] = $getPointingValue($index+1) * $getPointingValue($index+2);
        break;
        case 99:
            return -1;
        default:
            die('smth went wrong');
    };

    return $index+4;
};