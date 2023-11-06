<?php
include_once '../db.php';
if ($_SERVER['REQUEST_METHOD']=="POST"){
    // echo '<pre>';
    // print_r ($_REQUEST);
    // die();
    $TENLOAIHANG = $_REQUEST['TENLOAIHANG'];


    $sql = "INSERT INTO loaihangs 
    ( TENLOAIHANG) 
    VALUES 
    ('$TENLOAIHANG')";
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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                    <h2>THÊM LOẠI HÀNG</h2>

                    <form action="" method="POST" >
                      <label for="fname">Tên hàng</label><br>
                      <input type="text"  name="TENLOAIHANG"><br>
                      
                     
                      <input type="submit" value="Submit">
                    </form> 

                
           

               

            </div>
            <!-- End of Main Content -->

            <!-- Footer
           <?php 
                 include '../include/footer.php';
           ?> -->
            <!-- End of Footer -->