<?php

echo $_SERVER["REQUEST_METHOD"];
echo "<pre>";
print_r($_GET);
echo "</pre>";

if (isset($_GET["submit"])) {
  echo $_GET["username"];
  echo '<br>';
  echo $_GET["password"];
}

// if ( $_SERVER["REQUEST_METHOD"] == "Get$_GET" ) {
//     echo $_GET["username"];
//     echo '<br>';
//     echo $_GET["password"];
// }
?>

<!DOCTYPE html>
<html>

<body>
  <form action="" method="get">
    Username <input type="text" name="username"> <br>
    Password <input type="password" name="password"> <br>
    <input type="submit" name="submit" value="login">
  </form>
</body>

</html>