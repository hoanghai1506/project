<?php
 require_once 'connect.php';
    $Ma_San_Pham = $_POST['Ma_San_Pham'];
    $Ma_Loai = $_POST['Ma_Loai'];
    $Ten_San_Pham = $_POST['Ten_San_Pham'];
    $So_Luong_Trong_Kho = $_POST['So_Luong_Trong_Kho'];
    $Gia = $_POST['Gia'];
    $Mo_ta = $_POST['Mo_ta'];
    $sql = "update san_pham set Ma_Loai='$Ma_Loai',Ten_San_Pham='$Ten_San_Pham',So_Luong_Trong_Kho='$So_Luong_Trong_Kho',Gia='$Gia',Mo_ta='$Mo_ta' where Ma_San_Pham='$Ma_San_Pham'";
    mysqli_query($ketnoi,$sql);
    // mysqli_close($ketnoi);
    header('location:quanlysanpham.php');
?>