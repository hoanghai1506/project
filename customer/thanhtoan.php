<?php 
    session_start();
    if(!isset($_SESSION['Ten_Dang_Nhap'])){
        $_SESSION['error'] = 1;
        header('location:hoa_don.php');
    } else {
        $_SESSION['alert'] = 1;
        require_once 'connect.php';
        $Ten_Dang_Nhap = $_SESSION['Ten_Dang_Nhap'];
        $ngay_dat_hang = date('Y-m-d');
        $sql_id_khach_hang = "SELECT Ma_Khach_Hang FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
        $result_id_khach_hang = mysqli_query($ketnoi, $sql_id_khach_hang);
        foreach ($result_id_khach_hang as $id_khach_hang){
            $id_khach_hang = $id_khach_hang['Ma_Khach_Hang'];
        };
        $sql = "INSERT INTO hoa_don(Ma_Khach_Hang, Ngay,Trang_Thai) VALUES ('$id_khach_hang', '$ngay_dat_hang',0)";
        $result = mysqli_query($ketnoi, $sql);
        $sql_id_hoa_don = "SELECT MAX(Ma_Hoa_Don) as MA FROM hoa_don ";
        $result_id_hoa_don = mysqli_query($ketnoi, $sql_id_hoa_don);
        foreach ($result_id_hoa_don as $id_hoa_don){
            $id_hoa_don = $id_hoa_don['MA'];
        };
        $hoa_don_chi_tiet = $_SESSION['cart'];
        foreach($hoa_don_chi_tiet as $Ma_San_Pham => $So_Luong){
            $sql_gia = "SELECT Gia FROM san_pham WHERE Ma_San_Pham = '$Ma_San_Pham'";
            $result_gia = mysqli_query($ketnoi, $sql_gia);
            foreach ($result_gia as $gia_san_pham){
                $gia_san_pham = $gia_san_pham['Gia'];
            };
            $soluong=$So_Luong['So_Luong'];
            $sql_insert_chi_tiet = "INSERT INTO hoa_don_chi_tiet VALUES ('$id_hoa_don', '$Ma_San_Pham', '$gia_san_pham', '$soluong')";
            $result_insert_chi_tiet = mysqli_query($ketnoi, $sql_insert_chi_tiet);
        }
        unset($_SESSION['cart']);
        mysqli_close($ketnoi);
        header('location:index.php');
    }
?>