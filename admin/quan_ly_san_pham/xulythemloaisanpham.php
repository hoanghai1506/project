<?php
$TenLoai = $_POST['Ten_Loai'];
$ketnoi = mysqli_connect("localhost", "root", "", "project_web");
mysqli_set_charset($ketnoi, 'utf8');
$sql = "insert into loai(Ten_Loai) values('$TenLoai')";
mysqli_query($ketnoi, $sql);
header("location:quanlyloaisanpham.php");