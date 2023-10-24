<!DOCTYPE html>
<html>
<head>
    <title>Ứng dụng máy tính</title>
</head>
<body>
    <h1>Ứng dụng máy tính</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="operand1">Toán hạng 1:</label>
        <input type="number" name="operand1" required><br><br>

        <label for="operator">Toán tử:</label>
        <select name="operator" required>
            <option value="+">Cộng</option>
            <option value="-">Trừ</option>
            <option value="*">Nhân</option>
            <option value="/">Chia</option>
        </select><br><br>

        <label for="operand2">Toán hạng 2:</label>
        <input type="number" name="operand2" required><br><br>

        <input type="submit" value="Tính">
    </form>

    <?php
    // Xử lý khi người dùng gửi form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $operand1 = $_POST["operand1"];
        $operand2 = $_POST["operand2"];
        $operator = $_POST["operator"];
        $result = 0;
        $error = false;

        // Kiểm tra toán tử và thực hiện phép tính tương ứng
        switch ($operator) {
            case "+":
                $result = $operand1 + $operand2;
                break;
            case "-":
                $result = $operand1 - $operand2;
                break;
            case "*":
                $result = $operand1 * $operand2;
                break;
            case "/":
                if ($operand2 == 0) {
                    echo "Lỗi: Không thể chia cho 0.";
                    $error = true;
                } else {
                    $result = $operand1 / $operand2;
                }
                break;
            default:
                echo "Lỗi: Toán tử không hợp lệ.";
                $error = true;
        }

        // Hiển thị kết quả nếu không có lỗi
        if (!$error) {
            echo "Kết quả: " . $operand1 . " " . $operator . " " . $operand2 . " = " . $result;
        }
    }
    ?>
</body>
</html>