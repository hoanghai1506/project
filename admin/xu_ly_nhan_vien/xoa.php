
<?php
include '../check_ql.php';
$Ma_Nhan_Vien= $_GET['Ma_Nhan_Vien'];
$Trang_Thai= $_GET['Trang_Thai'];
require_once("conect.php");
$sql="UPDATE nhan_vien set Trang_Thai=$Trang_Thai WHERE Ma_Nhan_Vien=$Ma_Nhan_Vien";
mysqli_query($ketnoi,$sql);
// $sql = "delete from nhan_vien where Ma_Nhan_Vien=$Ma_Nhan_Vien";
// mysqli_query($ketnoi,$sql);
header("location:quanlynhanvien.php");