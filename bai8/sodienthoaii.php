<?php
$Pattern = "/^\(\d{2}\)-\(0\d{9}\)$/";
$so = "(84)-(0978489648)";
if (preg_match($Pattern,$so)) {
    echo "hop le";
}
else {
    echo "khong hop le";
}