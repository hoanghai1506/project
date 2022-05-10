<?php
require_once 'conect.php';
$Ma_Nhan_Vien = $_POST['Ma_Nhan_Vien'];
$Ten_Nhan_Vien = $_POST['Ten_Nhan_Vien'];
$Dia_Chi = $_POST['Dia_Chi'];
$Ngay_Sinh = $_POST['Ngay_Sinh'];
$So_Dien_Thoai = $_POST['So_Dien_Thoai'];
$Cap_Do = $_POST['Cap_Do'];
$sql = "update nhan_vien set Ten_Nhan_Vien='$Ten_Nhan_Vien',Dia_Chi='$Dia_Chi',Ngay_Sinh='$Ngay_Sinh',So_Dien_Thoai='$So_Dien_Thoai',Cap_Do='$Cap_Do' where Ma_Nhan_Vien='$Ma_Nhan_Vien'";
mysqli_query($ketnoi,$sql);
mysqli_close($ketnoi);
header('location:quanlynhanvien.php');
?>