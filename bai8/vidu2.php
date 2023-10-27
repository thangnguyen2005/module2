<?php
$subject = "Chào mừng bạn đến với CodeGym. CodeGym - Hệ thống đào tạo lập trình hiện đại.";
$pattern = '/CodeGym/';
print('<pre>');
preg_match_all($pattern, $subject, $matches);
print_r($matches);
print('</pre>');
?> 