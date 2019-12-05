<?php
// https://adventofcode.com/2019/day/2

require 'shared.php';

$codes[1] = 12;
$codes[2] = 2;

$nextIndex = 0;
while ($nextIndex >= 0) {
    $nextIndex = $interpretOpcodeOnIndex($nextIndex);
}

var_dump($codes);