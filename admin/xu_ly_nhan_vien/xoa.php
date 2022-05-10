<?php
$Ma_Nhan_Vien= $_GET['Ma_Nhan_Vien'];
require_once("conect.php");
$sql = "delete from nhan_vien where Ma_Nhan_Vien=$Ma_Nhan_Vien";
mysqli_query($ketnoi,$sql);
header("location:quanlynhanvien.php");