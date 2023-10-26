<?php 
function count_occurrences($numbers, $value) {
    // Khởi tạo biến đếm
    $count = 0;
  
    // Duyệt toàn bộ các phần tử của mảng
    foreach ($numbers as $number) {
      // Nếu có phần tử trùng với giá trị $value thì tăng biến $count lên 1 đơn vị
      if ($number == $value) {
        $count++;
      }
    }
  
    // Trả về kết quả
    return $count;
  }
  $numbers = [1, 2, 3, 3, 3, 4,3,4,2,3,3,4,4,4,4,4,4,4,4,3,3,3,3,3,3,3,3,3,3,2,2,2,2,];
  $value = 3;
  
  $count = count_occurrences($numbers, $value);
  
  echo "Số " . $value . " xuất hiện " . $count . " lần trong mảng" ;
    