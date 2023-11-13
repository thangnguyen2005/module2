<style>
#content-wrapper {
  display: flex;
  flex-direction: column;
}

#content {
  margin: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

label[for="thongbao"] {
  color: red;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

</style>
<?php

session_start();

include_once '../db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $TENKHOAHOC = $_REQUEST['TENKHOAHOC'];
  $NGAYBATDAU = $_REQUEST['NGAYBATDAU'];
  $NGAYKETTHUC = $_REQUEST['NGAYKETTHUC'];

  if ($TENKHOAHOC == '') {
      $tbao['TENKHOAHOC'] = 'Không được bỏ trống tên khóa học';
  }
  if ($NGAYBATDAU == '') {
      $tbao['NGAYBATDAU'] = 'Không được bỏ trống ngày bắt đầu';
  }
  if ($NGAYKETTHUC == '') {
      $tbao['NGAYKETTHUC'] = 'Không được bỏ trống ngày kết thúc';
  }
  else {
      $sql = "INSERT INTO khoahocs (TENKHOAHOC, NGAYBATDAU, NGAYKETTHUC) VALUES ('$TENKHOAHOC', '$NGAYBATDAU', '$NGAYKETTHUC')";

      $conn->exec($sql);

      
      // Đặt thông báo thành công vào biến session
      $_SESSION['success_message'] = 'Thêm khóa học thành công!';
      
      header("Location: index.php");
  }

}

?>
<?php
include '../include/header.php';
include '../include/sidebar.php';

?>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <h2>Thêm khóa học</h2>

        <form action="" method="POST">
            <label for="fname">Tên khóa học</label><br>
            <input type="text" name="TENKHOAHOC"><br>
            <label for="thongbao" style="color: red;"><?php if (!empty($tbao)) { echo $tbao['TENKHOAHOC']; } ?></label> <br>
            <label for="fname">Ngày bắt đầu</label><br>
            <input type="date" name="NGAYBATDAU"><br>
            <label for="thongbao" style="color: red;"><?php if (!empty($tbao)) { echo $tbao['NGAYBATDAU']; } ?></label> <br>
            <label for="fname">Ngày kết thúc</label><br>
            <input type="date" name="NGAYKETTHUC"><br>
            <label for="thongbao" style="color: red;"><?php if (!empty($tbao)) { echo $tbao['NGAYKETTHUC']; } ?></label> <br>
            <input type="submit" value="Submit">
        </form>

    </div>

</div>

  <?php
  include '../include/footer.php';
  ?>