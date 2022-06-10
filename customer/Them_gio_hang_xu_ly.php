<?php
require_once 'connect.php';
session_start();
// unset($_SESSION["cart"]);
$Ma_San_Pham = $_GET["Ma_San_Pham"];
$loai = $_GET["Ma_Loai"];
$type = $_GET["type"];
$sql = "SELECT sp.So_Luong_Trong_Kho FROM san_pham as sp where sp.Ma_San_Pham = $Ma_San_Pham";
$result = mysqli_query($ketnoi, $sql);
$row = mysqli_fetch_assoc($result);
var_dump($row);
die;
// foreach ($result as $each) {
//     $So_Luong_Trong_Kho = $each['So_Luong_Trong_Kho'];
// }
if($row>0){

    if (empty($_SESSION["cart"][$Ma_San_Pham])) {
        require_once 'connect.php';
        // $_SESSION['Ten_Dang_Nhap']= $Ten_Dang_Nhap;
        $sql = "SELECT * 
                    FROM san_pham as sp
                    JOIN anh_san_pham as a 
                        USING(Ma_San_Pham)
                    where Ma_San_Pham = '$Ma_San_Pham'";
        $result = mysqli_query($ketnoi, $sql);
        $each = mysqli_fetch_array($result);
        $_SESSION["cart"][$Ma_San_Pham]["Ten_San_Pham"] = $each["Ten_San_Pham"];
        $_SESSION["cart"][$Ma_San_Pham]["Gia"] = $each["Gia"];
        $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] = 1;
        $_SESSION["cart"][$Ma_San_Pham]["Anh"] = $each["Anh"];
    } else {
        $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] += 1;
    };
}else{
    $_SESSION['err']=1;
}

if ($type === 'trang_toan_bo_sp') {
    header("location:view_all_product.php?Ma_Loai=$loai");
} else {
    header("location:index.php");
}
