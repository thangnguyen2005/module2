<?php
session_start();

include_once '../db.php';

$sql = "SELECT * FROM thong_tin_benh_nhans";

$stmt = $conn->query($sql);

$stmt->setFetchMode(PDO::FETCH_ASSOC); 

$rows = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $Ten_Benh_Nhan = $_REQUEST['Ten_Benh_Nhan'];
  $Phong = $_REQUEST['Phong'];
  $Ngay_Nhap_Vien = $_REQUEST['Ngay_Nhap_Vien'];
  $Gioi_Tinh = $_REQUEST['Gioi_Tinh'];
  $Tinh_Trang = $_REQUEST['Tinh_Trang'];
  $Thong_Tin = $_REQUEST['Thong_Tin'];

  $tbao = [];

  if ($Ten_Benh_Nhan == '') {
      $tbao['Ten_Benh_Nhan'] =  'Không được bỏ trống tên bệnh nhân';
  }
  if ($Phong == '') {
      $tbao['Phong'] =  'Không được bỏ trống số phòng';
  }
  if ($Ngay_Nhap_Vien == '') {
      $tbao['Ngay_Nhap_Vien'] =  'Không được bỏ trống ngày nhập viện';
  }
  if ($Gioi_Tinh == '') {
      $tbao['Gioi_Tinh'] =  'Không được bỏ trống Giới tính';
  }
  if ($Tinh_Trang == '') {
      $tbao['Tinh_Trang'] =  'Không được bỏ trống Tình trạng';
  }
  if ($Thong_Tin == '') {
    $tbao['Thong_Tin'] =  'Không được bỏ trống thông tin';
}
  else
  {
      $sql = "INSERT INTO thong_tin_benh_nhans
      ( Ten_Benh_Nhan, Phong, Ngay_Nhap_Vien , Gioi_Tinh , Tinh_Trang, Thong_Tin)
      VALUES
      ('$Ten_Benh_Nhan','$Phong','$Ngay_Nhap_Vien','$Gioi_Tinh','$Tinh_Trang', '$Thong_Tin')";

        $conn->exec($sql);

          // Đặt thông báo thành công vào biến session
          $_SESSION['success_message'] = 'Thêm thành công!';

          // Chuyển hướng đến trang index.php
          header("Location: index.php");
    }

}

?>

<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">

    <h2>Thêm Bệnh Nhân</h2>

    <form action="" method="POST" enctype="multipart/form-data">
 
      <label for="lname">Tên bệnh nhân</label><br>
      <input type="text" name="Ten_Benh_Nhan"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['Ten_Benh_Nhan']; } ?></label> <br>

      <label for="lname">Phòng</label><br>
      <select id="lname" name="Phong" required>
            <option value="Chọn phòng">Vui lòng chọn phòng</option>
            <option value="Phòng 1">Phòng 1</option>
            <option value="Phòng 2">Phòng 2</option>
            <option value="Phòng 3">Phòng 3</option>
        </select>

      <label for="lname">Ngày nhập viện</label><br>
      <input type="date" name="Ngay_Nhap_Vien"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['Ngay_Nhap_Vien']; } ?></label> <br>

      <label for="Gioi_Tinh">Giới tính:</label>
        <select id="Gioi_Tinh" name="Gioi_Tinh" required>
            <option value="Chọn Giới Tính">Vui lòng chọn giới tính</option>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>

      <label for="lname">Tình trạng</label><br>
      <input type="text" name="Tinh_Trang"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['Tinh_Trang']; } ?></label> <br>

      <label for="lname">Thông tin</label><br>
      <input type="text" name="Thong_Tin"><br><br>
      <label for="thongbao" style="color: red;"><?php if(!empty($tbao)){ echo $tbao['Thong_Tin']; } ?></label> <br>

      <input type="submit" value="Submit">
      <a href="http://localhost/baithuchanh/thong_tin_benh_nhans/index.php" role="button" class="btn btn-outline-warning">Thoát</a>
    </form>

  </div>

  <style>
  
#content-wrapper {
  display: flex;
  flex-direction: column;
}

#content {
  margin: 20px;
}

h2 {
  text-align: center;
  font-size: 30px;
  margin-bottom: 10px;
  color: blue;
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

input[type="submit"],
a.btn-outline-warning {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
}

input[type="submit"]:hover,
a.btn-outline-warning:hover {
    background-color: #45a049;
}
</style>
