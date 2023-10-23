<!DOCTYPE html>
<html>
<head>
    <title>Tính giá trị tương lai</title>
</head>
<body>
    <h1>Tính giá trị tương lai</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="investment">Số tiền đầu tư:</label>
        <input type="number" name="investment" required><br><br>
        
        <label for="interest_rate">Lãi suất hàng năm (%):</label>
        <input type="number" name="interest_rate" required><br><br>
        
        <label for="years">Số năm:</label>
        <input type="number" name="years" required><br><br>
        
        <input type="submit" value="Tính">
    </form>

    <?php
    // Kiểm tra xem dữ liệu đã được gửi lên hay chưa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ biến $_POST
        $investment = $_POST['investment'];
        $interest_rate = $_POST['interest_rate'];
        $years = $_POST['years'];

        // Tính giá trị tương lai
        $future_value = $investment * pow(1 + $interest_rate / 100, $years);

        // Hiển thị kết quả
        echo "<h2>Kết quả</h2>";
        echo "Số tiền đầu tư ban đầu: $investment<br>";
        echo "Lãi suất hàng năm: $interest_rate%<br>";
        echo "Số năm: $years<br>";
        echo "Giá trị tương lai: $future_value";
    }
    ?>
</body>
</html>