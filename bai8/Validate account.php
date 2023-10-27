<?php
 $Pattern = "/^[_a-z0-9]{6,}$/";
 $account = "123abc";
 if (preg_match($Pattern,$account)) {
    echo "hop le";
 }
 else {
    echo "khong hop le";
 }

?>