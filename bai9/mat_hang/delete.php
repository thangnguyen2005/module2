<?php

include_once '../db.php';
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
$mysql = "DELETE FROM mat_hangs WHERE MAHANG = $id";
$conn->exec($mysql);
header("Location:index.php");
die();