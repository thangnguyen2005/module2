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

$sql = "SELECT * FROM hocviens";

$stmt = $conn->query($sql);

$stmt->setFetchMode(PDO::FETCH_ASSOC); 

$rows = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $TENHOCVIEN = $_REQUEST['TENHOCVIEN'];
  $NGAYSINH = $_REQUEST['NGAYSINH'];
  $GIOITINH = $_REQUEST['GIOITINH'];
  $EMAIL = $_REQUEST['EMAIL'];
  $DIACHI = $_REQUEST['DIACHI'];
  if (isset($_FILES['ANH'])) {
      if (!$_FILES['ANH']['error']) {
          move_uploaded_file($_FILES['ANH']['tmp_name'], ROOT_DIR . '/public/uploads/' . $_FILES['ANH']['name']);
          $ANH = '/public/uploads/' . $_FILES['ANH']['name'];
      }
  }

  $tbao = [];

  if ($TENHOCVIEN == '') {
      $tbao['TENHOCVIEN'] =  'Không được bỏ trống mã công ty';
  }
  if ($NGAYSINH == '') {
      $tbao['NGAYSINH'] =  'Không được bỏ trống số lượng';
  }
  if ($GIOITINH == '') {
      $tbao['GIOITINH'] =  'Không được bỏ trống đơn vị tính';
  }
  if ($EMAIL == '') {
      $tbao['EMAIL'] =  'Không được bỏ trống giá hàng';
  }
  if ($DIACHI == '') {
      $tbao['DIACHI'] =  'Không được bỏ trống giá hàng';
  }
  else
  {
      $sql = "INSERT INTO hocviens
      ( TENHOCVIEN, NGAYSINH, GIOITINH , EMAIL , DIACHI, ANH)
      VALUES
      ('$TENHOCVIEN','$NGAYSINH','$GIOITINH','$EMAIL','$DIACHI', '$ANH')";

        $conn->exec($sql);

          // Đặt thông báo thành công vào biến session
          $_SESSION['success_message'] = 'Thêm thành công!';

          // Chuyển hướng đến trang index.php
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

    <h2>Thêm học viên</h2>

    <form action="" method="POST" enctype="multipart/form-data">
 
      <label for="lname">Tên học viên</label><br>
      <input type="text" name="TENHOCVIEN"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['TENHOCVIEN']; } ?></label> <br>

      <label for="lname">Ngày sinh</label><br>
      <input type="date" name="NGAYSINH"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['NGAYSINH']; } ?></label> <br>

      <label for="lname">Giới tính</label><br>
      <input type="text" name="GIOITINH"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['GIOITINH']; } ?></label> <br>

      <label for="lname">Email</label><br>
      <input type="text" name="EMAIL"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['EMAIL']; } ?></label> <br>

      <label for="lname">Địa chỉ</label><br>
      <input type="text" name="DIACHI"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['DIACHI']; } ?></label> <br>

      <label for="lname">Ảnh</label><br>
      <input type="file" name="ANH"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['ANH']; } ?></label> <br>

      <input type="submit" value="Submit">
    </form>

  </div>

  <?php
  include '../include/footer.php';
  
  ?>