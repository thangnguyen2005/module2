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
$sql = "SELECT * FROM khoahocs";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows = $stmt->fetchAll();


$sql2 = "SELECT * FROM hocviens";
// Truy vấn
$stmt2 = $conn->query($sql2);
// Thiết lập kiểu dữ liệu trả về
$stmt2->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows2 = $stmt2->fetchAll();

try {
    // Thực hiện xóa hàng cha
    $stmt = $conn->prepare("DELETE FROM hocviens WHERE ID = :hocvien_id");
    $stmt->bindParam(':hocvien_id', $hocvien_id);
    $stmt->execute();
    
    // Kiểm tra số hàng bị ảnh hưởng
    $affected_rows = $stmt->rowCount();
    
    if ($affected_rows > 0) {
        // Xóa thành công
        echo "Xóa hàng cha thành công!";
    } else {
        // Không tìm thấy hàng cha hoặc không có quyền xóa
        echo "Không thể xóa hàng cha!";
    }
} catch (PDOException $e) {
    // Xử lý lỗi ràng buộc khóa ngoại
    if ($e->getCode() == '23000') {
        echo "Không thể xóa hàng cha do có hàng con liên quan!";
    } else {
        echo "Lỗi không xác định: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $hocviens_id  = $_REQUEST['hocviens_id'];
    $khoahocs_id  = $_REQUEST['khoahocs_id'];
    $NGAYBATDAU = $_REQUEST['NGAYBATDAU'];
    $NGAYKETTHUC = $_REQUEST['NGAYKETTHUC'];


$sql = "UPDATE dangkyhocs SET 
    hocviens_id  = '$hocviens_id ',
    khoahocs_id  = '$khoahocs_id ',
    NGAYBATDAU = '$NGAYBATDAU',
    NGAYKETTHUC = '$NGAYKETTHUC'
  
    WHERE ID = $id";
  
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

<div id="content">
        <h2>Sửa khóa học</h2>

        <form action="" method="POST">

            <label for="khoahocs_id">Tên khóa học</label><br>
            <select name="khoahocs_id">
                <?php foreach ($rows as $row) : ?>
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['TENKHOAHOC']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <label for="hocviens_id">Tên học viên</label><br>
            <select name="hocviens_id">
                <?php foreach ($rows2 as $row2) : ?>
                    <option value="<?php echo $row2['ID']; ?>"><?php echo $row2['TENHOCVIEN']; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="NGAYBATDAU">Ngày bắt đầu</label><br>
            <input type="date" name="NGAYBATDAU"><br><br>

            <label for="NGAYKETTHUC">Ngày kết thúc</label><br>
            <input type="date" name="NGAYKETTHUC"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

<?php 
                 include '../include/footer.php';
           ?>