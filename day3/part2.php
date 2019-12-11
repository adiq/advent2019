<?php
// https://adventofcode.com/2019/day/3

require 'shared.php';

$getIntersectionPathSteps = function(string $intersection) use ($wiresPath) {
    $wireOneSteps = array_search($intersection, $wiresPath[0]);
    $wireTwoSteps = array_search($intersection, $wiresPath[1]);

    return [$wireOneSteps, $wireTwoSteps];
};

$minIntersectionSteps = null;
foreach ($intersections as $intersection) {
    [$wireOneSteps, $wireTwoSteps] = $getIntersectionPathSteps($intersection);
    $totalIntersectionSteps = $wireOneSteps + $wireTwoSteps;
    
    if ($minIntersectionSteps === null || $minIntersectionSteps > $totalIntersectionSteps) {
        $minIntersectionSteps = $totalIntersectionSteps;
    }
};

var_dump('min intersection steps', $minIntersectionSteps);