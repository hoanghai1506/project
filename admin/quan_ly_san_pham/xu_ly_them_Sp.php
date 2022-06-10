<?php
session_start();
$_SESSION['err']=1;
$Ma_Loai = $_POST['Ma_Loai'];
$Ten_San_Pham = $_POST['Ten_San_Pham'];
$So_Luong_Trong_Kho = $_POST['So_Luong_Trong_Kho'];
$Gia = $_POST['Gia'];
$Mo_ta = $_POST['Mo_ta'];
$Anh = $_FILES['Anh'];
require_once('connect.php');
$sql = "INSERT INTO san_pham(Ma_Loai, Ten_San_Pham, So_Luong_Trong_Kho, Gia, Mo_Ta) VALUES ('$Ma_Loai', '$Ten_San_Pham', '$So_Luong_Trong_Kho', '$Gia', '$Mo_ta')";
mysqli_query($ketnoi, $sql);
// header('location:quanlysanpham.php');
$sql_lay_anh = "SELECT Ma_San_Pham 
                FROM san_pham 
                ORDER BY Ma_San_Pham DESC 
                LIMIT 1";
// lưu ảnh vào thư mục uploads
$folder = 'anh/';
$file_extension = explode('.', $Anh['name'])[1];
$file_name =  time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($Anh["tmp_name"], $path_file);
$result_lay_anh = mysqli_query($ketnoi, $sql_lay_anh);
foreach ($result_lay_anh as $each) {
    $Ma_San_Pham = $each['Ma_San_Pham'];
}
$sql_nhap_Anh = "INSERT INTO anh_san_pham(Ma_San_Pham, Anh) VALUES ('$Ma_San_Pham', '$file_name')";
mysqli_query($ketnoi, $sql_nhap_Anh);
    // mysqli_close($ketnoi);
header("location:quanlysanpham.php");