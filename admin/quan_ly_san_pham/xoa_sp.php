<?php 
    $Ma_San_Pham = $_GET['Ma_San_Pham'];
    require_once("connect.php");
    $sql_de ="UPDATE san_pham SET So_Luong_Trong_Kho = 0 WHERE Ma_San_Pham = '$Ma_San_Pham'";
    // $sql = "delete from San_Pham where Ma_San_Pham=$Ma_San_Pham";
    mysqli_query($ketnoi,$sql_de);
    header("location:quanlysanpham.php");
