<?php
$dictionary = [
    "hello" => "xin chào",
    "how" => "thế nào",
    "book" => "quyển vở",
    "computer" => "máy tính"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchword = $_POST['search'];
    $flag = 0;
    $word = "";
    $description = "";

    foreach ($dictionary as $wordKey => $descriptionValue) {
        if ($wordKey == $searchword) {
            $flag = 1;
            $word = $wordKey;
            $description = $descriptionValue;
            break;
        }
    }

    if ($flag == 0) {
        echo "Không tìm thấy từ cần tra.";
    } else {
        echo "Từ " . $word . ".<br/>Nghĩa của từ: " . $description;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Từ Điển Anh-Việt</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Từ Điển Anh-Việt</h2>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Nhập từ cần tìm" />
        <input type="submit" name="submit" value="Tìm">
    </form>
</body>

</html>