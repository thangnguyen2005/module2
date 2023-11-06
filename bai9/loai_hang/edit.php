<?php
include_once '../db.php';
if( isset( $_GET['id'] ) ){
    $id = $_GET['id'];
}else{
    $id = 0;
}

$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

if( !$id ){
    header("Location: index.php");
}
$sql = "SELECT * FROM loaihangs WHERE MALOAIHANG  = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
// Lay ve du lieu duy nhat
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
// die();

if( $_SERVER['REQUEST_METHOD'] == "POST" ){
    // in du lieu nguoi dung gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();
    // 
    $TENLOAIHANG = $_REQUEST['TENLOAIHANG'];
  

    $sql = "UPDATE loaihangs SET TENLOAIHANG = '$TENLOAIHANG' WHERE MALOAIHANG = $id";
     //Thuc hien truy van
     $conn->exec($sql);

     // chuyen huong ve trang danh sach
     header("Location: index.php");
}


?>


<?php
      include '../include/header.php';
      include '../include/sidebar.php';

      ?>

<h2>THÊM MẶT HÀNG</h2>

<form action="" method="POST" >
  <label for="fname">Tên hàng</label><br>
  <input type="text"  name="TENLOAIHANG" value="<?= $row['TENLOAIHANG'];?>"><br>

 
  <input type="submit" value="Submit">
</form> 


<?php 
                 include '../include/footer.php';
           ?>