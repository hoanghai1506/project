<?php
    session_start();
    require_once 'connect.php';
    $Mat_khau=$_POST['mk_cu'];
    $Mat_khau_moi=$_POST['mk_moi'];
    $Mat_khau_moi_2=$_POST['mk_moi_2'];
    $Ten_Dang_Nhap=$_SESSION['Ten_Dang_Nhap'];
    $sql_lay_mk_cu = "SELECT Mat_Khau FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
    $result_lay_mk_cu = mysqli_query($ketnoi, $sql_lay_mk_cu);
    foreach ($result_lay_mk_cu as $each){
        $Mat_khau_cu = $each['Mat_Khau'];
    }
    if($Mat_khau == $Mat_khau_cu){
        if($Mat_khau_moi == $Mat_khau_moi_2){
            $sql_thay_doi_mk = "UPDATE khach_hang SET Mat_Khau = '$Mat_khau_moi' WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
            $result_thay_doi_mk = mysqli_query($ketnoi, $sql_thay_doi_mk);
            if($result_thay_doi_mk){
                header('location: form_thay_doi_mk.php');
                echo "<script>alert('Thay đổi mật khẩu thành công')</script>";
                echo "<script>window.location.href='form_thay_doi_mk.php'</script>";
            }
            else{
                echo "<script>alert('Thay đổi mật khẩu thất bại')</script>";
                echo "<script>window.location.href='form_thay_doi_mk.php'</script>";
            }
        }
        else{
            header('location: form_thay_doi_mk.php');
            echo "<script>alert('Mật khẩu mới không trùng khớp')</script>";
            echo "<script>window.location.href='form_thay_doi_mk.php'</script>";
        }
    }
    else{
        header('location: form_thay_doi_mk.php');
        echo "<script>alert('Mật khẩu cũ không đúng')</script>";
        echo "<script>window.location.href='form_thay_doi_mk.php'</script>";
    }
    // header("location:form_thay_doi_mk.php");
?>