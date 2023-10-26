<!DOCTYPE html>
<html>
<head>
    <title>Phân loại số điện thoại</title>
</head>
<body>
    <h2>Phân loại số điện thoại</h2>
    <form method="post" action="">
        <textarea name="phone_numbers" rows="5" cols="50"></textarea><br>
        <input type="submit" value="Phân loại">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $phoneNumbers = $_POST["phone_numbers"];
            $numbers = explode(",", $phoneNumbers);

            $viettelNumbers = [];
            $mobifoneNumbers = [];
            $vinaphoneNumbers = [];

            foreach ($numbers as $number) {
                $number = trim($number);

                if (substr($number, 0, 3) === "086" || substr($number, 0, 3) === "096" || substr($number, 0, 3) === "097" || substr($number, 0, 3) === "098") {
                    $viettelNumbers[] = $number;
                } elseif (substr($number, 0, 3) === "089" || substr($number, 0, 3) === "090" || substr($number, 0, 3) === "093" || substr($number, 0, 3) === "070" || substr($number, 0, 3) === "079") {
                    $mobifoneNumbers[] = $number;
                } elseif (substr($number, 0, 3) === "088" || substr($number, 0, 3) === "091" || substr($number, 0, 3) === "094" || substr($number, 0, 3) === "083" || substr($number, 0, 3) === "084") {
                    $vinaphoneNumbers[] = $number;
                }
            }

            echo "<h3>Số điện thoại Viettel:</h3>";
            foreach ($viettelNumbers as $number) {
                echo $number . "<br>";
            }

            echo "<h3>Số điện thoại Mobifone:</h3>";
            foreach ($mobifoneNumbers as $number) {
                echo $number . "<br>";
            }

            echo "<h3>Số điện thoại Vinaphone:</h3>";
            foreach ($vinaphoneNumbers as $number) {
                echo $number . "<br>";
            }
        }
    ?>
</body>
</html>