<?php
$Ten_Nhan_Vien = $_POST['Ten_Nhan_Vien'];
$Dia_Chi = $_POST['Dia_Chi'];
$So_Dien_Thoai = $_POST['So_Dien_Thoai'];
$Ngay_Sinh = $_POST['Ngay_Sinh'];
$Ten_Dang_Nhap = $_POST['Ten_Dang_Nhap'];
$Mat_Khau = $_POST['Mat_Khau'];
$Cap_Do = $_POST['Cap_Do'];

require_once("conect.php");

$sql = "insert into nhan_vien(Ten_Nhan_Vien,Dia_Chi,So_Dien_Thoai,Ngay_Sinh,Ten_Dang_Nhap,Mat_Khau,Cap_Do) values('$Ten_Nhan_Vien','$Dia_Chi','$So_Dien_Thoai','$Ngay_Sinh','$Ten_Dang_Nhap','$Mat_Khau','$Cap_Do')";

mysqli_query($ketnoi,$sql);
echo "Thêm thành công";
header("location:quanlynhanvien.php");
?>
