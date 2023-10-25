<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $number = [];
    for ($i = 0; $i < 100; $i++) {
        $number[] = rand(0, 100);
    }
    if ($_SERVER["REQUEST_METHOD"]  == "POST") {
        $index = $_POST["number"];
    }
    $index = 1;
    try {
        // Hiển thị giá trị của phần tử có chỉ số nhập vào
        echo "Giá trị của phần tử có chỉ số $index là $number[$index]\n";
    } catch (Exception $e) {
        // Hiển thị thông báo lỗi nếu chỉ số không hợp lệ
        echo $e->getMessage();
    }

    ?>
</body>

</html>