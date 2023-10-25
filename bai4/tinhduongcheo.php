<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $mang = [
        [1, 2, 4],
        [4, 5, 6],
        [7, 8, 9]
    ];
    $hang = 0;
    $hangcantinh = 0;
    $cot = 0;
    $cotcantinh = 1;
    $cheophai = 0;
    $cheotrai = 0;
    for ($i = 0; $i < count($mang); $i++) {
        $hang += $mang[$hangcantinh][$i];
    }
    echo "Tổng hàng " . $hangcantinh . " là: " . $hang;
    for ($i = 0; $i < count($mang); $i++) {
        $cot += $mang[$i][$cotcantinh];
    }
    echo "<br>";
    echo "Tổng cột " . $cotcantinh . " là: " . $cot;
    for ($i = 0; $i < count($mang); $i++) {
        $cheophai += $mang[$i][$i];
    }
    echo "<br>";
    echo "Tổng đường chéo phải là: " . $cheophai;
    for ($i = 0; $i < count($mang); $i++) {
        $cheotrai += $mang[$i][count($mang) - 1 - $i];
    }
    echo "<br>";
    echo "Tổng đường chéo trái là: " . $cheotrai
    ?>
</body>

</html>