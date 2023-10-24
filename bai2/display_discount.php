<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Discount Calculator - Result</title>
</head>
<body>
    <h1>Product Discount Calculator - Result</h1>
    <?php 
    // Lấy dữ liệu từ form
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Product = $_POST["Product"];
        $Price = $_POST["Price"];
        $Discount = $_POST["Discount"];
        
        // Tính toán chiết khấu
        $discount_amount = $Price * $Discount * 0.1;
        $discount_price = $Price - $discount_amount;
        
        // Hiển thị kết quả
        echo "<p><strong>Product Description:</strong> $Product</p>";
        echo "<p><strong>List Price:</strong> $Price</p>";
        echo "<p><strong>Discount Percent:</strong> $Discount%</p>";
        echo "<p><strong>Discount Amount:</strong> $discount_amount</p>";
        echo "<p><strong>Discount Price:</strong> $discount_price</p>";
    }
    ?>
</body>
</html>