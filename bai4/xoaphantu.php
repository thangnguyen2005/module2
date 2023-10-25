<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
   $x = 6;
   $index = 0;
   for ($i = 0; $i < 10; $i++) {
      $index++;
      if ($array[$i] == $x) {
         break;
      }
   }
   unset($array[$index - 1]);
   echo "<pre>";
   print_r($array)
   ?>
</body>

</html>