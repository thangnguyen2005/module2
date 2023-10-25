<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $Array = [ 12,23,3,4,5,6,7,8,9,10,11
    ];
    $min = $Array[0];
    $mang = count($Array);
    for ($i = 0; $i <= $mang -1; $i++) {
        if ($Array[$i] < $min) {
            $min = $Array[$i];
        }
    }
    echo $min;

    ?>
</body>

</html>