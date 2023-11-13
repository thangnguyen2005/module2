<?php
include_once '../db.php';
$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
$mysql = "DELETE FROM thong_tin_benh_nhans WHERE ID = $id";
$conn->exec($mysql);
header("Location:index.php");
die();