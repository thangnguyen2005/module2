<?php
include_once '../db.php';
$sql = "SELECT * FROM `loaihangs`";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows = $stmt->fetchAll(); //[]

// echo '<pre>';
// print_r($rows);
// die();
?>

  <?php
include '../include/header.php';
include '../include/sidebar.php';

?>



<h2>Liệt kê mặt hàng</h2>

<a class="btn btn-primary" href="http://localhost/bai9/loai_hang/create.php" role="button">Thêm</a>

<table border="1">
  <tr>
    <th>STT</th>
    <th>Tên loại hàng</th>

    <th>Hành động</th>

  </tr>

  <?php
foreach ($rows as $r):
    // echo '<pre>';
    // print_r($r['TENHANG']);
    // die();
    ?>
	    <tr>
	        <td><?php echo $r['MALOAIHANG']; ?> </td>
	        <td><?php echo $r['TENLOAIHANG']; ?> </td>

	        <td>
	<a class="btn btn-info" href="edit.php?id=<?php echo $r['MALOAIHANG']; ?>" role="button">Sửa</a>|
    <a class="btn btn-danger" href="delete.php?id=<?php echo $r['MALOAIHANG']; ?>" onclick="return confirm('Are you sure?');" role="button">Xóa</a>

	        </td>


	    </tr>

	    <!-- Kết thúc vòng lặp -->
	    <?php endforeach;?>

</table>

<?php
include '../include/footer.php';
?>