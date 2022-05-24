<?php
    $Ma_San_Pham = $_GET['Ma_San_Pham'];
    require_once("connect.php");
    $sql = "delete from anh_san_pham where Ma_San_Pham=$Ma_San_Pham";
    mysqli_query($ketnoi,$sql);
    header("location:anhsp.php");
    mysqli_close($ketnoi);