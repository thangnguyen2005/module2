<?php
include_once '../db.php';

$sql_loaihangs = "SELECT * FROM `loaihangs`";
$stmt_loaihangs = $conn->query($sql_loaihangs);
$stmt_loaihangs->setFetchMode(PDO::FETCH_ASSOC);
$rows_loaihangs = $stmt_loaihangs->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (!$id) {
    header("Location: index.php");
}

$sql_mat_hang = "SELECT * FROM `mat_hangs` WHERE MAHANG = $id";
$stmt_mat_hang = $conn->query($sql_mat_hang);
$stmt_mat_hang->setFetchMode(PDO::FETCH_ASSOC);
$row_mat_hang = $stmt_mat_hang->fetch();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $TENHANG = $_POST['TENHANG'];
    $MACONGTY = $_POST['MACONGTY'];
    $MALOAIHANG = $_POST['MALOAIHANG'];
    $SOLUONG = $_POST['SOLUONG'];
    $DONVITINH = $_POST['DONVITINH'];
    $GIAHANG = $_POST['GIAHANG'];

    $sql_update = "UPDATE `mat_hangs` SET `TENHANG` = '$TENHANG', `GIAHANG` = $GIAHANG, `SOLUONG` = $SOLUONG, `DONVITINH` = '$DONVITINH', `MACONGTY` = '$MACONGTY', `MALOAIHANG` = '$MALOAIHANG' WHERE `MAHANG` = $id";
    $conn->exec($sql_update);

    header("Location: index.php");
}
?>

 <?php
include '../include/header.php';
include '../include/sidebar.php';

?>
<style>
    /* Kiểu dáng cho form */
    form {
        margin-top: 20px;
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"],
    input[type="number"],
    select {
        width: 300px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
    }
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Kiểu dáng cho tiêu đề */
    h2 {
        margin-bottom: 20px;
        font-size: 24px;
    }
</style>
<div style="margin-left: 10px">

<h2>THÊM MẶT HÀNG</h2>

<form action="" method="POST">
    <label for="fname">Tên hàng</label><br>
    <input type="text" name="TENHANG" value="<?= $row_mat_hang['TENHANG']; ?>"><br>
    <label for="lname">Mã Công ty</label><br>
    <input type="number" name="MACONGTY" value="<?= $row_mat_hang['MACONGTY']; ?>"><br><br>
    <label for="lname">Mã loại hàng</label><br>
    <select name="MALOAIHANG">
    <?php foreach ($rows_loaihangs as $row_loaihang) : ?>
        <option value="<?php echo $row_loaihang['MALOAIHANG']; ?>" <?php if ($row_loaihang['MALOAIHANG'] == $row_mat_hang['MALOAIHANG']) echo "selected"; ?>>
            <?php echo $row_loaihang['TENLOAIHANG']; ?>
        </option>
    <?php endforeach; ?>
</select><br><br>
    <label for="lname">Số lượng</label><br>
    <input type="number" name="SOLUONG" value="<?= $row_mat_hang['SOLUONG']; ?>"><br><br>
    <label for="lname">Đơn vị tính</label><br>
    <input type="text" name="DONVITINH" value="<?= $row_mat_hang['DONVITINH']; ?>"><br><br>
    <label for="lname">Giá hàng</label><br>
    <input type="number" name="GIAHANG" value="<?= $row_mat_hang['GIAHANG']; ?>"><br><br>

    <input type="submit" value="Submit">
</form>
</div>
<?php
include '../include/footer.php';
?>