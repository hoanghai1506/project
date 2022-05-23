<?php
$Ma_Loai= $_POST['Ma_Loai'];
$Ten_San_Pham = $_POST['Ten_San_Pham'];
$So_Luong_Trong_Kho = $_POST['So_Luong_Trong_Kho'];
$Gia = $_POST['Gia'];
$Mo_ta = $_POST['Mo_ta'];
require_once('connect.php');
$sql = "INSERT INTO san_pham(Ma_Loai, Ten_San_Pham, So_Luong_Trong_Kho, Gia, Mo_Ta) VALUES ('$Ma_Loai', '$Ten_San_Pham', '$So_Luong_Trong_Kho', '$Gia', '$Mo_ta')";
mysqli_query($ketnoi, $sql);
header('location:quanlysanpham.php');
?>
