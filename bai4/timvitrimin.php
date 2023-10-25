<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function mang($array)
    {
        $GiaTri = min($array);
        $ViTri = array_search($GiaTri, $array);
        return $ViTri;
    }

    $array = [10, 5, 8, 3, 6];
    $GiaTriViTri = mang($array);
    echo "Vị trí của phần tử có giá trị nhỏ nhất trong mảng là: " . $GiaTriViTri;
    ?>
</body>

</html>