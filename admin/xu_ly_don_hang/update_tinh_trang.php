
<?php
    require_once '../check_nv.php';
    $Ten_Dang_Nhap=$_SESSION['Ten_Dang_Nhap'];
    $Ma_Hoa_Don=$_GET["Ma_Hoa_Don"];
    $Trang_Thai=$_GET["Trang_Thai"];
    require '../quan_ly_san_pham/connect.php';
    $sql="UPDATE hoa_don set Trang_Thai=$Trang_Thai WHERE Ma_Hoa_Don=$Ma_Hoa_Don";
    mysqli_query($ketnoi,$sql);
    
    $sql_lay_id="SELECT Ma_Nhan_Vien from nhan_vien WHERE Ten_Dang_Nhap='$Ten_Dang_Nhap'";
    $result_lay_id=mysqli_query($ketnoi,$sql_lay_id);
    foreach($result_lay_id as $each){
        $Ma_Nhan_Vien=$each['Ma_Nhan_Vien'];
    }
    $sql_ins="UPDATE  hoa_don set Ma_Nhan_Vien = '$Ma_Nhan_Vien' WHERE Ma_Hoa_Don='$Ma_Hoa_Don'";
    mysqli_query($ketnoi,$sql_ins);
    $sql_lay_so_Luong = "SELECT * FROM hoa_don_chi_tiet WHERE Ma_Hoa_Don = $Ma_Hoa_Don";
    $result_lay_so_Luong = mysqli_query($ketnoi,$sql_lay_so_Luong);
    if($Trang_Thai==1){

        foreach($result_lay_so_Luong as $each){
            $Ma_San_Pham=$each['Ma_San_Pham'];
            $So_Luong=$each['So_Luong'];
            $sql_lay_So_Luong_Trong_Kho = "SELECT So_Luong_Trong_Kho FROM san_Pham WHERE Ma_San_Pham = $Ma_San_Pham";
            $result_lay_So_Luong_Trong_Kho = mysqli_query($ketnoi,$sql_lay_So_Luong_Trong_Kho);
            foreach($result_lay_So_Luong_Trong_Kho as $each){
                $So_Luong_Trong_Kho=$each['So_Luong_Trong_Kho'];
            }
            $So_Luong_Con_Lai_Trong_Kho = $So_Luong_Trong_Kho - $So_Luong;
            $sql_update_So_Luong_Trong_Kho = "UPDATE san_pham SET So_Luong_Trong_Kho = $So_Luong_Con_Lai_Trong_Kho WHERE Ma_San_Pham = $Ma_San_Pham";
            mysqli_query($ketnoi,$sql_update_So_Luong_Trong_Kho);
    };
    }
    
    header("location:quanlydonhang.php");


?>