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

$soBanGhiTrenMotTrang = 3; // Số bản ghi hiển thị trên mỗi trang
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

$sql = "SELECT khoahocs.TENKHOAHOC, khoahocs.NGAYBATDAU, khoahocs.NGAYKETTHUC, hocviens.TENHOCVIEN, hocviens.ANH, hocviens.DIACHI, dangkyhocs.id as dangkyhoc_id
FROM dangkyhocs
JOIN khoahocs ON dangkyhocs.khoahocs_id = khoahocs.ID
JOIN hocviens ON dangkyhocs.hocviens_id = hocviens.ID";

// Xử lý yêu cầu tìm kiếm
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];

  // Thêm điều kiện tìm kiếm vào câu truy vấn SQL
  $sql .= " WHERE khoahocs.TENKHOAHOC LIKE '%$keyword%' OR hocviens.TENHOCVIEN LIKE '%$keyword%'";
}

$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$tongSoBanGhi = count($rows);
$tongSoTrang = ceil($tongSoBanGhi / $soBanGhiTrenMotTrang);

// Lấy bản ghi cho trang hiện tại
$boQua = ($trangHienTai - 1) * $soBanGhiTrenMotTrang;
$sql = $sql . " LIMIT $soBanGhiTrenMotTrang OFFSET $boQua";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<h2 style="text-align: center;">Thông Tin Học Viên</h2>

<a href="http://localhost/bai9/dangkyhocs/create.php" role="button" class="btn btn-outline-warning">Thêm</a>

<form method="GET" action="">
  <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
  <button type="submit" class="btn btn-info">Tìm kiếm</button>
</form>

<table>
  <tr>
    <th>STT</th>
    <th>Tên khóa học</th>
    <th>Ngày bắt đầu</th>
    <th>Ngày kết thúc</th>
    <th>Tên học viên</th>
    <th>Ảnh</th>
    <th>Địa chỉ</th>
    <th>Hành động</th>
  </tr>

  <?php
  $count = ($trangHienTai - 1) * $soBanGhiTrenMotTrang + 1;
  foreach ($rows as $row):
  ?>
  <tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $row['TENKHOAHOC']; ?></td>
    <td><?php echo $row['NGAYBATDAU']; ?></td>
    <td><?php echo $row['NGAYKETTHUC']; ?></td>
    <td><?php echo $row['TENHOCVIEN']; ?></td>
    <td><img width="100" src="http://localhost/bai9<?php echo $row['ANH']; ?>" /></td>
    <td><?php echo $row['DIACHI']; ?></td>
    <td>
      <a class="btn btn-info" href="edit.php?id=<?php echo $row['dangkyhoc_id']; ?>" role="button">Sửa</a>|
      <a class="btn btn-danger" href="delete.php?id=<?php echo $row['dangkyhoc_id']; ?>" onclick="return confirm('Bạn có chắc chắn?');" role="button">Xóa</a>
    </td>
  </tr>
  <?php
  $count++;
  endforeach;
  ?>
</table>

<div class="phantrang">
  <?php if ($trangHienTai > 1): ?>
    <a href="?trang=<?php echo $trangHienTai - 1; ?>">Trang trước</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $tongSoTrang; $i++): ?>
    <a href="?trang=<?php echo $i; ?>" <?php echo $i == $trangHienTai ? 'class="hientai"' : ''; ?>><?php echo $i; ?></a>
  <?php endfor; ?>

  <?php if ($trangHienTai < $tongSoTrang): ?>
    <a href="?trang=<?php echo $trangHienTai + 1; ?>">Trang sau</a>
  <?php endif; ?>
</div>

<?php include '../include/footer.php'; ?>

<script>
// Tự động tắt thông báo sau 5 giây (5000 miligiây)
setTimeout(function() {
    var successAlert = document.getElementById('success-alert');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 2000);
</script> 