<?php

function selectionSort($array)
{
    for ($i = 0; $i < count($array) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j;
            }
        }
        $array = swapPositions($array, $i, $min);
    }
    return $array;
}

function swapPositions($data, $left, $right)
{
    $backupOldDataRightValue = $data[$right];
    $data[$right] = $data[$left];
    $data[$left] = $backupOldDataRightValue;
    return $data;
}

$myArray = [3, 0, 2, 5, -1, -4, 4, 1];
echo "Mảng gốc :\n";
echo implode(', ', $myArray);
echo "<br>";
echo "\nMảng được sắp xếp :\n";
echo implode(', ', selectionSort($myArray));