<?php
include_once '../db.php';

$sql_hocviens = "SELECT * FROM `hocviens`";
$stmt_hocviens = $conn->query($sql_hocviens);
$stmt_hocviens->setFetchMode(PDO::FETCH_ASSOC);
$rows_hocviens = $stmt_hocviens->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql_hocvien = "SELECT * FROM `hocviens` WHERE ID = $id";
$stmt_hocvien = $conn->query($sql_hocvien);
$row_hocvien = $stmt_hocvien->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $TENHOCVIEN = $_POST['TENHOCVIEN'];
    $NGAYSINH = $_POST['NGAYSINH'];
    $GIOITINH = $_POST['GIOITINH'];
    $EMAIL = $_POST['EMAIL'];
    $DIACHI = $_POST['DIACHI'];
    $ANH = '';

    if (isset($_FILES['ANH']) && !$_FILES['ANH']['error']) {
        move_uploaded_file($_FILES['ANH']['tmp_name'], ROOT_DIR . '/public/uploads/' . $_FILES['ANH']['name']);
        $ANH = '/public/uploads/' . $_FILES['ANH']['name'];
    }

    $sql_update = "UPDATE hocviens SET 
        `TENHOCVIEN` = '$TENHOCVIEN',
        `NGAYSINH` ='$NGAYSINH',
        `GIOITINH` = '$GIOITINH',
        `EMAIL` ='$EMAIL',
        `DIACHI` = '$DIACHI',
        `ANH` = '$ANH' WHERE ID = $id";
    $conn->exec($sql_update);

    header("Location: index.php");
    exit;
}
?>

<?php
include '../include/header.php';
include '../include/sidebar.php';
?>

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

<div style="margin-left: 10px">
    <h2>Sửa thông tin học viên</h2>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="TENHOCVIEN">Tên học viên:</label>
        <input type="text" id="TENHOCVIEN" name="TENHOCVIEN" value="<?php echo $row_hocvien['TENHOCVIEN']; ?>" required>

        <label for="NGAYSINH">Ngày sinh:</label>
        <input type="text" id="NGAYSINH" name="NGAYSINH" value="<?php echo $row_hocvien['NGAYSINH']; ?>" required>

        <label for="GIOITINH">Giới tính:</label>
        <select id="GIOITINH" name="GIOITINH" required>
            <option value="Nam" <?php if ($row_hocvien['GIOITINH'] === 'Nam') echo 'selected'; ?>>Nam</option>
            <option value="Nữ" <?php if ($row_hocvien['GIOITINH'] === 'Nữ') echo 'selected'; ?>>Nữ</option>
        </select>

        <label for="EMAIL">Email:</label>
        <input type="text" id="EMAIL" name="EMAIL" value="<?php echo $row_hocvien['EMAIL']; ?>" required>

        <labelTiếp tục từ phần mã PHP đã sửa chữa:

        <label for="DIACHI">Địa chỉ:</label>
        <input type="text" id="DIACHI" name="DIACHI" value="<?php echo $row_hocvien['DIACHI']; ?>" required>

        <label for="ANH">Ảnh:</label>
        <input type="file" id="ANH" name="ANH">

        <input type="submit" value="Cập nhật">
    </form>
</div>

<script>
    function validateForm() {
        var TENHOCVIEN = document.getElementById("TENHOCVIEN").value;
        var NGAYSINH = document.getElementById("NGAYSINH").value;
        var GIOITINH = document.getElementById("GIOITINH").value;
        var EMAIL = document.getElementById("EMAIL").value;
        var DIACHI = document.getElementById("DIACHI").value;
        var ANH = document.getElementById("ANH").value;

        if (TENHOCVIEN === "" || NGAYSINH === "" || GIOITINH === "" || EMAIL === "" || DIACHI === "" || ANH === "") {
            alert("Vui lòng điền đầy đủ thông tin!");
            return false;
        }
    }
</script>

<?php
include '../include/footer.php';
?>