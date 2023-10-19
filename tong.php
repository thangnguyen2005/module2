<?php
//b1 kiem tra nguoi dung gui du lieu
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //b2 in ra du lieu nguoi dung gui len
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
    //b3 luu tru vao bien
    $SoA = $_POST['so_a'];
    $SoB = $_POST['so_b'];
    //b4 xu ly
    $tong = $SoA + $SoB;
    //b5 xuat
    echo "ket qua la: " . $tong;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        SoA <input type="text" name="so a"> <br>
        SoB <input type="text" name="so b"> <br>
        <input type="submit" name="submit" value="tong">
    </form>
</body>

</html>