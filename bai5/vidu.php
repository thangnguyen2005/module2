<?php 
// function linearSearch($arr, $target) {
//     $length = count($arr);
//     for ($i = 0; $i < $length; $i++) {
//         if ($arr[$i] == $target) {
//             return $i;  // Trả về vị trí của phần tử cần tìm nếu tìm thấy
//         }
//     }
//     return -1;  // Trả về -1 nếu không tìm thấy phần tử trong mảng
// }
// // Ví dụ về việc sử dụng tìm kiếm tuyến tính
// $myArray = [1, 3, 5, 7, 9, 11, 13];
// $targetValue = 7;
// $result = linearSearch($myArray, $targetValue);
// if ($result != -1) {
//     echo "Phần tử $targetValue được tìm thấy tại vị trí $result.";
// } else {
//     echo "Phần tử $targetValue không tồn tại trong mảng.";
// }
function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;
    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        if ($arr[$mid] == $target) {
            return $mid;  // Trả về vị trí của phần tử cần tìm nếu tìm thấy
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;  // Trả về -1 nếu không tìm thấy phần tử trong mảng
}
// Ví dụ về việc sử dụng tìm kiếm nhị phân
$myArray = [1, 3, 5, 7, 9, 11, 13, 15];
$targetValue = 11;
$result = binarySearch($myArray, $targetValue);
if ($result != -1) {
    echo "Phần tử $targetValue được tìm thấy tại vị trí $result.";
} else {
    echo "Phần tử $targetValue không tồn tại trong mảng.";
}