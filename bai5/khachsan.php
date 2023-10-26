<?php
function matrixElementsSum($matrix) {
    $row_count = count($matrix);
    $col_count = count($matrix[0]);
    $total_sum = 0;

    for ($col = 0; $col < $col_count; $col++) {
        for ($row = 0; $row < $row_count; $row++) {
            if ($matrix[$row][$col] == 0) {
                break;
            }
            $total_sum += $matrix[$row][$col];
        }
    }

    return $total_sum;
}

$matrix = [
[0, 0, 1, 2], 
[0, 5, 0, 0], 
[2, 0, 3, 3]];
$result = matrixElementsSum($matrix);
echo $result;