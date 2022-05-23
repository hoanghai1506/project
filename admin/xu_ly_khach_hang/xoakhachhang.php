<?php 
    $Ma_Khach_Hang=$_GET['Ma_Khach_Hang'];
    $ketnoi = mysqli_connect("localhost","root","","project_web");
    mysqli_set_charset($ketnoi,'utf8');
    $sql="delete from khach_hang where Ma_Khach_Hang=$Ma_Khach_Hang";
    mysqli_query($ketnoi,$sql);
    header("location:quanlykhachhang.php");
    mysqli_close($ketnoi);
?>