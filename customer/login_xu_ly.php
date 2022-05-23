<?php 
    session_start();
    $ketnoi = mysqli_connect("localhost","root","","project_web");
    $Ten_Dang_Nhap= $_POST['Ten_Dang_Nhap'];
    $Mat_Khau = $_POST['Mat_Khau'];
    $sql = "SELECT * FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap' AND Mat_Khau = '$Mat_Khau'";
    $result = mysqli_query($ketnoi, $sql);
    $sql_check= "SELECT count(Ma_Khach_Hang) as so_account FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap' and Mat_Khau = '$Mat_Khau'";
    $result_check = mysqli_query($ketnoi, $sql_check);
    foreach($result_check as $each){
        $so_account = $each['so_account'];
    }
    if ($so_account>0){
        $_SESSION['Ten_Dang_Nhap'] = $Ten_Dang_Nhap;
        header("location:trang_khach_hang_khi_dang_nhap.php");
        echo "Đăng nhập thành công";
    } else {
        header("location:login.php");
    }
    mysqli_close($ketnoi);
?>