<?php
// https://adventofcode.com/2019/day/3

$wires = [];
$file = fopen("input.txt","r");
  
while(!feof($file))  {
    $line = fgets($file);
    $wires[] = explode(',',$line);
}

$mapPathPosition = function (array $wirePath, string $moveCode) {
    $currentPosition = end($wirePath);
    [$currentPositionX, $currentPositionY] = explode(':', $currentPosition);

    $moveDirection = substr($moveCode, 0, 1);
    $moveDistance = (int) substr($moveCode, 1);

    while ($moveDistance > 0) {
        switch ($moveDirection) {
            case 'R':
                $currentPositionX++;
            break;
            case 'L':
                $currentPositionX--;
            break;
            case 'U':
                $currentPositionY++;
            break;
            case 'D':
                $currentPositionY--;
            break;
        }
        $wirePath[] = $currentPositionX.':'.$currentPositionY;
        $moveDistance--;
    }
    return $wirePath;
};

// map wires
foreach ($wires as $index => $wire) {
    $wiresPath[$index] = ['0:0'];
    foreach ($wire as $moveCode) {
        $wiresPath[$index] = $mapPathPosition($wiresPath[$index], $moveCode);
    }
}

$calculateDistanceFromStartingPoint = function (string $position) {
    [$positionX, $positionY] = explode(':', $position);
    $positionX = $positionX >= 0 ? $positionX : -$positionX;
    $positionY = $positionY >= 0 ? $positionY : -$positionY;

    return $positionX + $positionY;
};

// find intersections
$intersections = array_intersect($wiresPath[0], $wiresPath[1]);
array_shift($intersections);

$findClosestIntersection = function(array $intersections) use ($calculateDistanceFromStartingPoint) {
    $closestIntersectionDistance = null;
    $closestIntersection = null;
    foreach ($intersections as $intersection) {
        $intersectionDistance = $calculateDistanceFromStartingPoint($intersection);
        if ($closestIntersectionDistance === null || $closestIntersectionDistance > $intersectionDistance) {
            $closestIntersection = $intersection;
            $closestIntersectionDistance = $intersectionDistance;
        }
    }

    return [$closestIntersection, $closestIntersectionDistance];
};