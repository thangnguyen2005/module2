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

$sql = "SELECT * FROM khoahocs";

$stmt = $conn->query($sql);

$stmt->setFetchMode(PDO::FETCH_ASSOC); 

$rows = $stmt->fetchAll();

$sql1 = "SELECT * FROM hocviens";

$stmt1 = $conn->query($sql1);

$stmt1->setFetchMode(PDO::FETCH_ASSOC); 

$rows1 = $stmt1->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $khoahocs_id = $_POST['khoahocs_id'];
    $hocviens_id= $_POST['hocviens_id'];
    $NGAYBATDAU = $_POST['NGAYBATDAU'];
    $NGAYKETTHUC = $_POST['NGAYKETTHUC'];

    $sql = "INSERT INTO dangkyhocs (khoahocs_id, hocviens_id, NGAYBATDAU, NGAYKETTHUC) 
        VALUES ('$khoahocs_id', '$hocviens_id', '$NGAYBATDAU', '$NGAYKETTHUC')";

    $conn->exec($sql);

   // Đặt thông báo thành công vào biến session
   $_SESSION['success_message'] = 'Thêm thành công!';

    header("Location: index.php");
    exit();
}
?>

<?php
include '../include/header.php';
include '../include/sidebar.php';
?>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
        <h2>Sửa thông tin học viên</h2>

        <form action="" method="POST">

            <label for="khoahocs_id">Tên khóa học</label><br>
            <select name="khoahocs_id">
                <?php foreach ($rows as $row) : ?>
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['TENKHOAHOC']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <label for="hocviens_id">Tên học viên</label><br>
            <select name="hocviens_id">
                <?php foreach ($rows1 as $row1) : ?>
                    <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['TENHOCVIEN']; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="NGAYBATDAU">Ngày bắt đầu</label><br>
            <input type="date" name="NGAYBATDAU"><br><br>

            <label for="NGAYKETTHUC">Ngày kết thúc</label><br>
            <input type="date" name="NGAYKETTHUC"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php include '../include/footer.php'; ?>