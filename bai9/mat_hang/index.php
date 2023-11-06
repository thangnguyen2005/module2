<?php
include_once '../db.php';

$sql = "SELECT mat_hangs.*, loaihangs.TENLOAIHANG
        FROM mat_hangs 
        INNER JOIN loaihangs ON mat_hangs.MALOAIHANG = loaihangs.MALOAIHANG";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

 <?php
include '../include/header.php';
include '../include/sidebar.php';

?>
 
 <style>
  table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
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
 </style>
<h2>Liệt kê mặt hàng</h2>
<a href="http://localhost/bai9/mat_hang/create.php">THÊM</a>
<table>
  <tr>
    <th>STT</th>
    <th>Tên Hàng</th>
    <th>Mã Công Ty</th>
    <th>Tên loại hàng</th>
    <th>Số lượng</th>
    <th>Đơn vị tính</th>
    <th>Gía hàng</th>
    <th>Hành động</th>
  </tr>
  
  <?php
  $stt = 1;
  foreach ($rows as $row) :
  ?>
    <tr>
      <td><?php echo $stt++; ?></td>
      <td><?php echo $row['TENHANG']; ?></td>
      <td><?php echo $row['MACONGTY']; ?></td>
      <td><?php echo $row['TENLOAIHANG']; ?></td>
      <td><?php echo $row['SOLUONG']; ?></td>
      <td><?php echo $row['DONVITINH']; ?></td>
      <td><?php echo $row['GIAHANG']; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['MAHANG']; ?>">Sửa</a> |
        <a onclick="return confirm('Are you sure?');" href="delete.php?id=<?php echo $row['MAHANG']; ?>">Xóa</a>
      </td>
    </tr>
  <?php endforeach; ?>

</table>

<?php
include '../include/footer.php';
?>