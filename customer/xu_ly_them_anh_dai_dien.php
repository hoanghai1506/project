<?php
$Ten_Dang_Nhap=$_POST['Ten_Dang_Nhap'] ;
// die($Ten_Dang_Nhap);
$Anh = $_FILES['Anh'];
$folder = 'anh/';
$file_extension = explode('.', $Anh['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($Anh['tmp_name'], $path_file);
require_once 'connect.php';
$sql_id="SELECT Ma_Khach_Hang FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
$result_id=mysqli_query($ketnoi,$sql_id);
foreach($result_id as $each){
    $Ma_Khach_Hang=$each['Ma_Khach_Hang'];
}
$sql = "INSERT INTO anh_khach_hang(Id_khach_hang, Anh) VALUES ('$Ma_Khach_Hang', '$file_name')";
mysqli_query($ketnoi, $sql);
header("location:trang_ca_nhan.php");
?>