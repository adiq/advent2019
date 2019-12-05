<?php
// https://adventofcode.com/2019/day/2

require 'shared.php';

$expectedComputerOutput = 19690720;

$initialMemoryState = $codes;
$resetMemory = function () use (&$codes, $initialMemoryState) {
    $codes = $initialMemoryState;
};

$calculateOutput = function (int $noun, int $verb) use (&$codes, $interpretOpcodeOnIndex) : int {
    $codes[1] = $noun;
    $codes[2] = $verb;

    $nextIndex = 0;
    while ($nextIndex >= 0) {
        $nextIndex = $interpretOpcodeOnIndex($nextIndex);
    }

    return $codes[0];
};

$calculateAnswer = function (int $noun, int $verb) {
    return 100 * $noun + $verb;
};

for ($noun = 0; $noun <= 99; $noun++) {
    for ($verb = 0; $verb <= 99; $verb++) {
        $resetMemory();

        $value = $calculateOutput($noun, $verb);
        if ($value == $expectedComputerOutput) {
            var_dump('noun', $noun, 'verb', $verb);
            var_dump('answer', $calculateAnswer($noun, $verb));
            die;
        }
    }
}

die('not found');