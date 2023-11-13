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
$sql = "SELECT * FROM khoahocs WHERE ID  = $id";
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
    $TENKHOAHOC = $_REQUEST['TENKHOAHOC'];
    $NGAYBATDAU = $_REQUEST['NGAYBATDAU'];
    $NGAYKETTHUC = $_REQUEST['NGAYKETTHUC'];

  

    $sql = "UPDATE khoahocs SET TENKHOAHOC = '$TENKHOAHOC', `NGAYBATDAU` ='$NGAYBATDAU', `NGAYKETTHUC` = '$NGAYKETTHUC' WHERE ID = $id";
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

<h2>Sửa khóa học</h2>

<form action="" method="POST">
    <label for="fname">Tên khóa học</label><br>
    <input type="text" name="TENKHOAHOC" value="<?= $row['TENKHOAHOC']; ?>"><br>
    <input type="date" name="NGAYBATDAU" value="<?= $row['NGAYBATDAU']; ?>"><br>
    <input type="date" name="NGAYKETTHUC" value="<?= $row['NGAYKETTHUC']; ?>"><br>
    <input type="submit" value="Submit">
</form>


<?php 
                 include '../include/footer.php';
           ?>