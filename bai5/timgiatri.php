<?php 
function findMin($arr): int
{
    $min = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }
    return $min;
}
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9];

foreach ($nums as $num) {
    echo $num . " ";
}
$minValue = findMin($nums);
echo "</br>";
echo "Giá trị nhỏ nhất là: " . $minValue;
echo "</br>";
function findmax($arr): int
{
    $max = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9];

foreach ($nums as $num) {
    echo $num . " ";
}
$maxValue = findmax($nums);
echo "</br>";
echo "Giá trị lớn nhất là: " . $maxValue;