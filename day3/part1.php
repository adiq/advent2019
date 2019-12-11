<?php
// https://adventofcode.com/2019/day/3

require 'shared.php';

$findClosestIntersectionDistance = function(array $intersections) use ($findClosestIntersection) {
    return $findClosestIntersection($intersections)[1];
};

var_dump('closest intersection distance', $findClosestIntersectionDistance($intersections));