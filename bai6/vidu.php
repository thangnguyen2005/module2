<?php
$a = 6;
$b = 0;
    try {
        kiemtrab($b);
        $c = $a / $b;
        echo $c;
    } catch (Exception $e) {
        echo "xu ly bi loi" ;
        echo $e->getMessage();
    }
    finally {
        echo "ket thuc chuong trinh" ;
    }

    function kiemtrab($b) {
        if ($b == 0 ) {
            throw new Exception("gia tri b la 0");
        }
    }
