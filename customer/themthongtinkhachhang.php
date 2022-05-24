<?php 
    $Ten = $_POST['Ten_Khach_Hang'];
    $Dia_chi =$_POST['Dia_Chi'];
    $Ngay_sinh=$_POST['Ngay_Sinh'];
    $So_Dien_Thoai = $_POST['So_Dien_Thoai'];
    $Email = $_POST['Ten_Dang_Nhap'];
    $Mat_Khau = $_POST['Mat_Khau'];
    $Mat_Khau_2=$_POST['Mat_Khau_2'];
    if($Mat_Khau!=$Mat_Khau_2){
        echo "Mật khẩu không trùng khớp";
        header("Location:signin.html");  
     }  else{
        
    $ketnoi = mysqli_connect("localhost","root","","project_web");
        mysqli_set_charset($ketnoi,'utf8');
        $sql = "INSERT INTO khach_hang(Ten_Khach_Hang, Dia_Chi, Ngay_Sinh, So_Dien_Thoai, Ten_Dang_Nhap, Mat_Khau) VALUES ('$Ten', '$Dia_chi', '$Ngay_sinh', '$So_Dien_Thoai', '$Email', '$Mat_Khau')";
        $result=mysqli_query($ketnoi, $sql);
    }
    $lay_ID="SELECT 
    Ma_Khach_Hang 
    FROM khach_hang 
    order by Ma_Khach_Hang desc 
    limit 1";
    $result_ID=mysqli_query($ketnoi,$lay_ID);
    foreach($result_ID as $each){
        $Ma_Khach_Hang=$each['Ma_Khach_Hang'];
    }
    $sql_themanh="INSERT INTO anh_khach_hang(Id_khach_hang) VALUES ('$Ma_Khach_Hang')";
    $result_themanh=mysqli_query($ketnoi, $sql_themanh);
    mysqli_close($ketnoi);
   
    header('location:login.php');
?>