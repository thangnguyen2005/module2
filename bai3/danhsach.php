<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET">
        Chọn ngày sinh từ: <input id="from" type="date" name="from" placeholder="yyyy/mm/dd" value="<?php echo $fromDate ?? ''; ?>" />
        đến: <input id="to" type="date" name="to" placeholder="yyyy/mm/dd" value="<?php echo $toDate ?? ''; ?>" />
        <input type="submit" id="submit" value="Lọc" />
    </form>
</body>
<?php 
$customerList = [
    "1" => [
        "name" => "Mai Văn Hoàn",
        "day_of_birth" => "1983/08/20",
        "address" => "Hà Nội",
        "profile" => "images/img1.jpg"],
    "2" => [
        "name" => "Nguyễn Văn Nam",
        "day_of_birth" => "1983/08/21",
        "address" => "Bắc Giang",
        "profile" => "images/img2.jpg"],
    "3" => [
        "name" => "Nguyễn Thái Hòa",
        "day_of_birth" => "1983/08/22",
        "address" => "Nam Định",
        "profile" => "images/img3.jpg"],
    "4" => [
        "name" => "Trần Đăng Khoa",
        "day_of_birth" => "1983/08/17",
        "address" => "Hà Tây",
        "profile" => "images/img4.jpg"],
    "5" => [
        "name" => "Nguyễn Đình Thi",
        "day_of_birth" => "1983/08/19",
        "address" => "Hà Nội",
        "profile" => "images/img5.jpg"]
]; ?>

</html>