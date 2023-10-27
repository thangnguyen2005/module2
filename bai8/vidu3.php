<?php
$str = "Vi du ve ham preg_replace 21321 5 878";
$str = preg_replace("/[0-9]+/", "2000", $str);
print $str;
?>