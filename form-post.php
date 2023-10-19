<?php
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
echo $_SERVER["REQUEST_METHOD"];


if (isset($_POST["submit"])) {
  echo $_POST["username"];
  echo '<br>';
  echo $_POST["password"];
}
//b1 kiem tra trang thai gui len
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //b2 in ra du lieu ngupi dung gui len
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  //b3 luu tru vao bien
  $username = $_POST['username'];
  $password = $_POST['password'];
  //b4 xu ly
  echo $username;
  echo '<br>';
  echo $password;
}
?>

<!DOCTYPE html>
<html>

<body>
  <form action="" method="post">
    Username <input type="text" name="username"> <br>
    Password <input type="password" name="password"> <br>
    <input type="submit" name="submit" value="login">
  </form>
</body>

</html>