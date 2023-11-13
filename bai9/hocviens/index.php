<style>
  table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #4CAF50;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  a {
    text-decoration: none;
  }

  .btn {
    padding: 8px 12px;
    border: none;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #45A049;
  }

  .phantrang {
    margin-top: 10px;
    text-align: center;
  }

  .phantrang a {
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #4CAF50;
    background-color: white;
    color: #4CAF50;
    text-decoration: none;
    cursor: pointer;
  }

  .phantrang a:hover {
    background-color: #4CAF50;
    color: white;
  }

  .hientai {
    font-weight: bold;
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
if (isset($_GET['keyword'])) {
  // Lấy giá trị từ ô tìm kiếm
  $keyword = $_GET['keyword'];

  // Câu truy vấn SQL với điều kiện tìm kiếm
  $sql = "SELECT * FROM `hocviens` WHERE `TENHOCVIEN` LIKE '%$keyword%'";
} else {
  // Câu truy vấn SQL ban đầu
  $sql = "SELECT * FROM `hocviens`";
}

$soBanGhiTrenMotTrang = 4; // Số bản ghi hiển thị trên mỗi trang
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$sql = "SELECT * FROM hocviens WHERE TENHOCVIEN LIKE '%$keyword%'";
$boQua = ($trangHienTai - 1) * $soBanGhiTrenMotTrang;
$sql .= " LIMIT $soBanGhiTrenMotTrang OFFSET $boQua";

$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

$tongSoBanGhi = $conn->query("SELECT COUNT(*) FROM hocviens WHERE TENHOCVIEN LIKE '%$keyword%'")->fetchColumn();
$tongSoTrang = ceil($tongSoBanGhi / $soBanGhiTrenMotTrang);
?>

<?php
include '../include/header.php';
include '../include/sidebar.php';
?>

<h2>Danh sách học viên</h2>

<form method="GET" action="">
  <div class="form-group">
    <input type="text" name="keyword" placeholder="Tìm kiếm học viên">
    <button type="submit" class="btn btn-info">Tìm kiếm</button>
  </div>
</form>

<a href="http://localhost/bai9/hocviens/create.php" role="button" class="btn btn-outline-warning">Thêm Học viên</a>

<table border="1">
  <tr>
    <th>STT</th>
    <th>Tên học viên</th>
    <th>Ngày sinh</th>
    <th>Giới tính</th>
    <th>Email</th>
    <th>Địa chỉ</th>
    <th>Ảnh</th>
    <th>Hành động</th>
  </tr>

  <?php
  $count = ($trangHienTai - 1) * $soBanGhiTrenMotTrang + 1;

  foreach ($rows as $r) :
  ?>
    <tr>
      <td><?php echo $count; ?> </td>
      <td><?php echo $r['TENHOCVIEN']; ?> </td>
      <td><?php echo $r['NGAYSINH']; ?> </td>
      <td><?php echo $r['GIOITINH']; ?> </td>
      <td><?php echo $r['EMAIL']; ?> </td>
      <td><?php echo $r['DIACHI']; ?> </td>
      <td><img width="100" src="http://localhost/bai9<?php echo $r['ANH']; ?>" /></td>
      <td>
        <a href="edit.php?id=<?php echo $r['ID']; ?>" class="btn btn-info">Sửa</a> |
        <a class="btn btn-danger" href="delete.php?id=<?php echo $r['ID']; ?>" onclick="return confirm('Are you sure?');" role="button">Xóa</a>
      </td>
    </tr>
  <?php
    $count++;
  endforeach;
  ?>
</table>

<div class="phantrang">
  <?php if ($trangHienTai > 1) : ?>
    <a href="?trang=<?php echo $trangHienTai - 1; ?>&keyword=<?php echo $keyword; ?>">Trang trước</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $tongSoTrang; $i++) : ?>
    <a href="?trang=<?php echo $i; ?>&keyword=<?php echo $keyword; ?>" <?php echo $i === $trangHienTai ? 'class="hientai"' : ''; ?>><?php echo $i; ?></a>
  <?php endfor; ?>

  <?php if ($trangHienTai < $tongSoTrang) : ?>
    <a href="?trang=<?php echo $trangHienTai + 1; ?>&keyword=<?php echo $keyword; ?>">Trang sau</a>
  <?php endif; ?>
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