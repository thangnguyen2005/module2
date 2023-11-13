<style>
/* Thiết lập kiểu cho phân trang */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: center;
    margin: 20px 0;
}

.pagination a {
    text-decoration: none;
    margin: 0 5px;
    padding: 5px 10px;
    background-color: green;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.pagination a.active {
    background-color: #333;
}

/* Thiết lập kiểu cho bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
  }
/* Kiểu cho nút "Sửa" và "Xóa" */
.btn {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-right: 5px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

</style>

<?php
include_once '../db.php';

session_start();

// Kiểm tra xem có thông báo thành công trong biến session hay không
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success" id="success-alert">' . $_SESSION['success_message'] . '</div>';
    // Xoá thông báo sau khi đã hiển thị
    unset($_SESSION['success_message']);
}

// Kiểm tra xem người dùng đã gửi yêu cầu tìm kiếm chưa
if (isset($_GET['search'])) {
    // Lấy giá trị từ ô tìm kiếm
    $search = $_GET['search'];

    // Câu truy vấn SQL với điều kiện tìm kiếm
    $sql = "SELECT * FROM `khoahocs` WHERE `TENKHOAHOC` LIKE '%$search%'";
} else {
    // Câu truy vấn SQL ban đầu
    $sql = "SELECT * FROM `khoahocs`";
}

// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Số bản ghi trên mỗi trang
$records_per_page = 5;

// Tổng số bản ghi
$total_records = $stmt->rowCount();

// Tính tổng số trang
$total_pages = ceil($total_records / $records_per_page);

// Trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Vị trí bắt đầu lấy dữ liệu
$start = ($current_page - 1) * $records_per_page;

// Truy vấn dữ liệu với phân trang
$sql .= " LIMIT $start, $records_per_page";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll();
?>


<?php
include '../include/header.php';
include '../include/sidebar.php';
?>

<h2>Danh sách khóa học</h2>

<form method="GET" action="">
    <div class="form-group">
        <input type="text" name="search" placeholder="Tìm kiếm khóa học">
        <button type="submit" class="btn btn-info">Tìm kiếm</button>
    </div>
</form>

<a href="create.php" role="button" class="btn btn-outline-warning">Thêm khóa học</a>

<table border="1">
    <tr>
        <th>STT</th>
        <th>Tên khóa học</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th>Hành động</th>
    </tr>

    <?php
    $count = 1;
    foreach ($rows as $r):
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $r['TENKHOAHOC']; ?></td>
        <td><?php echo $r['NGAYBATDAU']; ?></td>
        <td><?php echo $r['NGAYKETTHUC']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $r['ID']; ?>" class="btn btn-info">Sửa</a> |
            <a class="btn btn-danger" href="delete.php?id=<?php echo $r['ID']; ?>" onclick="return confirm('Are you sure?');" role="button">Xóa</a>
        </td>
    </tr>
    <?php
    $count++; // Tăng biến đếm STT sau mỗi lần lặp
    endforeach;
    ?>
</table>

<div class="pagination">
    <?php
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $current_page) ? 'active' : '';
        echo "<a  $active_class' href='index.php?page=$i'>$i</a>";
    }
    ?>
</div>

<?php
include '../include/footer.php';
?>

<script>
// Tự động tắt thông báo sau 5 giây (5000 miligiây)
setTimeout(function() {
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 2000);
</script>