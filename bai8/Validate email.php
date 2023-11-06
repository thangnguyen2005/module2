<?php
 $Pattern = "/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/" ;
 $gmail = "thang@gmail.com";
 
 if (preg_match($Pattern, $gmail)) {
    echo "hợp lệ";
 }
 else {
    echo "không hợp lệ";
 }

?>