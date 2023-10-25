<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $Array = [
        [1,2,3,4],
        [5,6,16,8],
        [9,10,11,12]
    ];
    $max = $Array[0][0];
    for ($i = 0; $i <= 2; $i++) {
        for ($j = 0; $j <=3; $j++) {
            if  ($Array[$i][$j] > $max) {
                $max = $Array[$i][$j];
            }
        }
    }
    echo "$max";

    ?>
</body>
</html>