<?php
$string = 5;
$pattern = '/^[0-9]$/';
if (preg_match($pattern, $string)) {
echo 'Khớp';
} else {
echo 'Không khớp';
}
?>