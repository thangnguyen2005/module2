<?php
include_once '../db.php';
$sql = "SELECT * FROM `loaihangs`";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $TENHANG = $_REQUEST['TENHANG'];
    $MACONGTY = $_REQUEST['MACONGTY'];
    $MALOAIHANG = $_REQUEST['MALOAIHANG'];
    $SOLUONG = $_REQUEST['SOLUONG'];    
    $DONVITINH = $_REQUEST['DONVITINH'];
    $GIAHANG = $_REQUEST['GIAHANG'];

    $sql = "INSERT INTO `mat_hangs` 
    ( `TENHANG`, `MACONGTY`, `MALOAIHANG`, `SOLUONG`, `DONVITINH`, `GIAHANG`) 
    VALUES 
    ('$TENHANG','$MACONGTY','$MALOAIHANG','$SOLUONG','$DONVITINH','$GIAHANG')";
    $conn->exec($sql);
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
    input[type="text"] {
        width: 300px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    select {
        width: 300px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
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
    div {
        margin-left: 10px;
    }
</style>
<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <h2>THÊM MẶT HÀNG</h2>

        <form action="" method="POST">
            <label for="fname">Tên hàng</label><br>
            <input type="text" name="TENHANG"><br>
            <label for="fname">Mã công ty</label><br>
            <input type="text" name="MACONGTY"><br>
            <label for="fname">Mã loại hàng</label><br>
            <input type="text" name="MALOAIHANG"><br>
            <select name="MALOAIHANG">
                          <?php foreach ($rows as $row): ?>
                            <option value="<?php echo $row['MALOAIHANG']; ?>"><?php echo $row['TENLOAIHANG']; ?></option>
                          <?php endforeach;?>
                        </select><br><br>
            <label for="fname">Số lượng</label><br>
            <input type="text" name="SOLUONG"><br>
            <label for="fname">Đơn vị tính</label><br>
            <input type="text" name="DONVITINH"><br>
            <label for="fname">Giá hàng</label><br>
            <input type="text" name="GIAHANG"><br>

            <input type="submit" value="Submit">
        </form>

    </div>
    
    <?php
include '../include/footer.php';
?>