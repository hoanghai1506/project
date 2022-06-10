<?php
    require_once 'connect.php';
    session_start();
    $Ma_San_Pham =$_GET['Ma_San_Pham'];
    $type = $_GET['type'];
    $sql="SELECT So_Luong_Trong_Kho FROM san_Pham WHERE Ma_San_Pham = $Ma_San_Pham ";
    $result = mysqli_query($ketnoi,$sql);
    foreach ($result as $each){
        $So_Luong_Trong_Kho = $each['So_Luong_Trong_Kho'];
    
    echo $So_Luong_Trong_Kho;
    if($type==='decre'){
        if($_SESSION["cart"][$Ma_San_Pham]["So_Luong"]>1){
            $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] -= 1;
        }
        else{
            unset($_SESSION["cart"][$Ma_San_Pham]);
        }
    }
    else{
        // for( $i =1;$i<=$So_Luong_Trong_Kho; $i++ ){
        //     $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] += 1;
        // }
        // $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] += 1;
        if($So_Luong_Trong_Kho>$_SESSION["cart"][$Ma_San_Pham]["So_Luong"]){
            $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] += 1;
        }else {
            $_SESSION['err_het_hang']=1;
        }
        // $_SESSION["cart"][$Ma_San_Pham]["So_Luong"] += 1;
    }
}
    header("location:hoa_don.php");
?>