<?php 
    session_start();
    if($_SESSION['Cap_Do'] != 1){
        $_SESSION['error'] = 1;
        header("location:../trang_quan_ly.php");
    }
