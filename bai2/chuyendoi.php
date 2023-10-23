<?php

function read_number($num) {
    switch ($num) {
        case 0:
            echo "không";
            break;
        case 1:
            echo "một";
            break;
        case 2:
            echo "hai";
            break;
        case 3:
            echo "ba";
            break;
        case 4:
            echo "bốn";
            break;
        case 5:
            echo "năm";
            break;
        case 6:
            echo "sáu";
            break;
        case 7:
            echo "bảy";
            break;
        case 8:
            echo "tám";
            break;
        case 9:
            echo "chín";
            break;
        default:
            echo "không thể đọc";
            break;
    }
}

function read_two_digit_number($num) {
    if ($num < 20 && $num >= 10) {
        switch ($num) {
            case 10:
                echo "mười";
                break;
            case 11:
                echo "mười một";
                break;
            case 12:
                echo "mười hai";
                break;
            case 13:
                echo "mười ba";
                break;
            case 14:
                echo "mười bốn";
                break;
            case 15:
                echo "mười lăm";
                break;
            case 16:
                echo "mười sáu";
                break;
            case 17:
                echo "mười bảy";
                break;
            case 18:
                echo "mười tám";
                break;
            case 19:
                echo "mười chín";
                break;
            default:
                echo "không thể đọc";
                break;
        }
    } else if ($num >= 20 && $num < 100) {
        $tens = intval($num / 10);
        $ones = $num % 10;
        
        switch ($tens) {
            case 2:
                echo "hai mươi ";
                break;
            case 3:
                echo "ba mươi ";
                break;
            case 4:
                echo "bốn mươi ";
                break;
            case 5:
                echo "năm mươi ";
                break;
            case 6:
                echo "sáu mươi ";
                break;
            case 7:
                echo "bảy mươi ";
                break;
            case 8:
                echo "tám mươi ";
                break;
            case 9:
                echo "chín mươi ";
                break;
            default:
                echo "không thể đọc";
                break;
        }
        
        read_number($ones);
    }
}

function read_three_digit_number($num) {
    if ($num >= 100 && $num < 1000) {
        $hundreds = intval($num / 100);
        $tens_and_ones = $num % 100;
        
        read_number($hundreds);
        echo " trăm ";
        
        if ($tens_and_ones > 0) {
            read_two_digit_number($tens_and_ones);
        }
    }
}

// Kiểm tra các hàm
$num1 = 01;
$num2 = 13;
$num3 = 45;
$num4 = 999;

read_number($num1); // Output: năm
echo "<br>";
read_two_digit_number($num2); // Output: mười sáu
echo "<br>";
read_two_digit_number($num3); // Output: bốn mươi hai
echo "<br>";
read_three_digit_number($num4); // Output: một trăm hai mươi ba
echo "<br>";

?>