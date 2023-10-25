<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $chu = "hello world";
    $a = "o";
    $count= 0;
    for ($i = 0; $i < 11; $i++) {
        if ($chu[$i] === "o") {
            $count++;
        }
    }
    print_r("Kí tự " . $a . " xuất hiện: " . $count);
    ?>
</body>
</html>