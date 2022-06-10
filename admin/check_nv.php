<?php 
    session_start();
    if(!isset($_SESSION['Cap_Do'])  ){
        header("location:index.php");
    } 
    // if($_SESSION['Trang_Thai']===0){
    //     header("location:index.php");
    // }
?>