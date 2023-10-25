<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $array1 = [1,2,3,4,5];
    $array2 = [6,7,8,9,10];
    $array3 = [];
    
    for ($i = 0 ; $i < count($array1) ; $i++) {
         $array3[] = $array1[$i];
    }
    for ($i = 0 ; $i < count($array2) ; $i++) {
        $array3[] = $array2[$i];
   }
    print_r($array3);
    ?>
</body>
</html>