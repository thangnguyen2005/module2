<?php

function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("DivideByZeroException: Mẫu số bằng 0");
    }
    
    return $numerator / $denominator;
}

// Thử nghiệm chia 10 cho 2
try {
    $result = divide(10, 2);
    echo "Kết quả: " . $result;
} catch (Exception $e) {
    echo $e->getMessage();
}

// Thử nghiệm chia 5 cho 0 (gây ra ngoại lệ)
try {
    $result = divide(5, 0);
    echo "Kết quả: " . $result;
} catch (Exception $e) {
    echo $e->getMessage();
}

?>