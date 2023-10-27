<?php
 $pattern = '/^[CAP]\d{4}[GHIKLM]$/';
 $class = "C0318G";
 if (preg_match($pattern, $class)) {
     echo "dung roi";
 } 
 else {
     echo "sai roi";
 }