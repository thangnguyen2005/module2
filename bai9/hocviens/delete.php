<?php
include_once '../db.php';
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
$mysql = "DELETE FROM hocviens WHERE ID = $id";
$conn->exec($mysql);
header("Location:index.php");
die();