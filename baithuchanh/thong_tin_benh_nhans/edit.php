<?php
include_once '../db.php';

$sql_thong_tin_benh_nhans = "SELECT * FROM `thong_tin_benh_nhans`";
$stmt_thong_tin_benh_nhans = $conn->query($sql_thong_tin_benh_nhans);
$stmt_thong_tin_benh_nhans->setFetchMode(PDO::FETCH_ASSOC);
$rows_thong_tin_benh_nhans = $stmt_thong_tin_benh_nhans->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql_benhnhan = "SELECT * FROM `thong_tin_benh_nhans` WHERE ID = $id";
$stmt_benhnhan = $conn->query($sql_benhnhan);
$row_benhnhan = $stmt_benhnhan->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Ten_Benh_Nhan = $_POST['Ten_Benh_Nhan'];
    $Phong = $_POST['Phong'];
    $Ngay_Nhap_Vien = $_POST['Ngay_Nhap_Vien'];
    $Gioi_Tinh = $_POST['Gioi_Tinh'];
    $Tinh_Trang = $_POST['Tinh_Trang'];
    $Thong_Tin = $_POST['Thong_Tin'];

    $sql_update = "UPDATE thong_tin_benh_nhans SET 
        `Ten_Benh_Nhan` = '$Ten_Benh_Nhan',
        `Phong` ='$Phong',
        `Ngay_Nhap_Vien` = '$Ngay_Nhap_Vien',
        `Gioi_Tinh` ='$Gioi_Tinh',
        `Tinh_Trang` = '$Tinh_Trang',
        `Thong_Tin` = '$Thong_Tin' WHERE ID = $id";
    $conn->exec($sql_update);

    header("Location: index.php");
    exit;
}
?>

</style>

<div style="margin-left: 10px">
    <h2>Sửa thông tin bệnh nhân</h2>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="Ten_Benh_Nhan">Tên bệnh nhân:</label>
        <input type="text" id="Ten_Benh_Nhan" name="Ten_Benh_Nhan" value="<?php echo $row_benhnhan['Ten_Benh_Nhan']; ?>" required>

        <label for="Phong">Phòng:</label>
        <select id="Phong" name="Phong" required>
            <option value="Phòng 1" <?php echo ($row_benhnhan['Phong'] === 'Phòng 1') ? 'selected' : ''; ?>>Phòng 1</option>
            <option value="Phòng 2" <?php echo ($row_benhnhan['Phong'] === 'Phòng 2') ? 'selected' : ''; ?>>Phòng 2</option>
            <option value="Phòng 3" <?php echo ($row_benhnhan['Phong'] === 'Phòng 3') ? 'selected' : ''; ?>>Phòng 3</option>
        </select>


        <label for="Ngay_Nhap_Vien">Ngày nhập viện:</label>
        <input type="text" id="Ngay_Nhap_Vien" name="Ngay_Nhap_Vien" value="<?php echo $row_benhnhan['Ngay_Nhap_Vien']; ?>" required>

        <label for="Gioi_Tinh">Giới tính:</label>
        <select id="Gioi_Tinh" name="Gioi_Tinh" required>
            <option value="Nam" <?php echo ($row_benhnhan['Gioi_Tinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo ($row_benhnhan['Gioi_Tinh'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
        </select>


        <labelTiếp tục từ phần mã PHP đã sửa chữa: <label for="Tinh_Trang">Tình trạng:</label>
            <input type="text" id="Tinh_Trang" name="Tinh_Trang" value="<?php echo $row_benhnhan['Tinh_Trang']; ?>" required>

            <label for="Thong_Tin">Thông tin:</label>
            <input type="text" id="Thong_Tin" name="Thong_Tin" value="<?php echo $row_benhnhan['Thong_Tin']; ?>" required>

            <input type="submit" value="Cập nhật">
      <a href="http://localhost/baithuchanh/thong_tin_benh_nhans/index.php" role="button" class="btn btn-outline-warning">Thoát</a>

    </form>
</div>

<script>
    function validateForm() {
        var Ten_Benh_Nhan = document.getElementById("Ten_Benh_Nhan").value;
        var Phong = document.getElementById("Phong").value;
        var Ngay_Nhap_Vien = document.getElementById("Ngay_Nhap_Vien").value;
        var Gioi_Tinh = document.getElementById("Gioi_Tinh").value;
        var Tinh_Trang = document.getElementById("Tinh_Trang").value;
        var Thong_Tin = document.getElementById("Thong_Tin").value;

        if (Ten_Benh_Nhan === "" || Phong === "" || Ngay_Nhap_Vien === "" || Gioi_Tinh === "" || Tinh_Trang === "" || Thong_Tin === "") {
            alert("Vui lòng điền đầy đủ thông tin!");
            return false;
        }
    }
</script>

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
    input[type="date"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
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