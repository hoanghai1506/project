<?php
session_start();
$ketnoi = mysqli_connect("localhost","root","","project_web");
$Ten_Dang_Nhap= $_POST['Ten_Dang_Nhap'];
$Mat_Khau = $_POST['Mat_Khau'];
$Mat_Khau = preg_replace('/[\',\=]/', '', $Mat_Khau);
$sql_lay_trang_thai="SELECT Trang_Thai from nhan_vien WHERE Ten_Dang_Nhap='$Ten_Dang_Nhap'";
$result_lay_trang_thai=mysqli_query($ketnoi,$sql_lay_trang_thai);
foreach($result_lay_trang_thai as $each){
    $Trang_Thai=$each['Trang_Thai'];
}
if($Trang_Thai==1){

    $sql = "SELECT * FROM nhan_vien where Ten_Dang_Nhap = '$Ten_Dang_Nhap' and Mat_Khau = '$Mat_Khau'";
    $result = mysqli_query($ketnoi, $sql);
    if(mysqli_num_rows($result)==1){
        $each= mysqli_fetch_array($result);
        session_start();
        $_SESSION['Ten_Dang_Nhap'] = $Ten_Dang_Nhap;
        $_SESSION['Cap_Do'] = $each['Cap_Do'];
        // $_SESSION['Trang_Thai'] =$each['Trang_Thai'];
        header("location:trang_quan_ly.php");
    }else{
        $_SESSION['err'] =1 ;
        header("location:index.php");
    }
} else {
    $_SESSION['err'] =2 ;
    header("location:index.php");
}

