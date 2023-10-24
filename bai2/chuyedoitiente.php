<!DOCTYPE html>
<html>
<head>
    <title>Chuyển đổi USD sang VND</title>
</head>
<body>
    <h1>Chuyển đổi USD sang VND</h1>

    <?php
    // Bước 1: Tạo form để nhập số tiền USD
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Bước 3: Lấy giá trị USD từ người dùng
        $usdAmount = $_POST["usdAmount"];

        // Bước 2: Khai báo biến tỉ giá
        $rate = 23000;

        // Bước 4: Tính giá trị VND và hiển thị ra màn hình
        $vndAmount = $usdAmount * $rate;

        echo "<p>$usdAmount USD = $vndAmount VND</p>";
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="usdAmount">Nhập số tiền USD:</label>
        <input type="text" name="usdAmount" id="usdAmount" required>
        <input type="submit" value="Chuyển đổi">
    </form>
</body>
</html>