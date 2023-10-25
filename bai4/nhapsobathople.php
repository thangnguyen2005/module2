<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function calculate($x, $y)
    {
        $tong = $x + $y;
        $tru = $x - $y;
        $nhan = $x * $y;
        if ($y == 0) {
            $chia = "Lỗi phép tính";
        } else {
            $chia = $x / $y;
        }

        echo "Tổng x  +  y =  " . $tong . "<br>";
        echo "Trừ x  -  y =  " . $tru . "<br>";
        echo "Nhân x  *  y =  " . $nhan . "<br>";
        echo "Chia x  /  y =  " . $chia . "<br>";
    }
    calculate(0,0);
    ?>
</body>

</html>