<?php
 $pattern = '/^[CAP]\d{4}[GHIKLM]$/';
 $class = "C0318G";
 if (preg_match($pattern, $class)) {
     echo "hợp lệ";
 } 
 else {
     echo "không hợp lệ";
 }