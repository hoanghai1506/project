<?php
$Ma_Loai= $_GET["Ma_Loai"];
require_once("connect.php");
$sql = "delete from Loai where Ma_Loai=$Ma_Loai";
mysqli_query($ketnoi,$sql);
header("location:quanlyloaisanpham.php");