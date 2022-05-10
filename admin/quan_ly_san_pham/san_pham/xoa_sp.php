<?php 
    $Ma_San_Pham = $_GET['Ma_San_Pham'];
    require_once("connect.php");
    $sql = "delete from San_Pham where Ma_San_Pham=$Ma_San_Pham";
    mysqli_query($ketnoi,$sql);
    header("location:quanlysanpham.php");
