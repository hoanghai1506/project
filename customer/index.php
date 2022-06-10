<?php
    if(session_id() === '' ){
        session_start();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_SESSION['alert'])){
            echo "<script>alert('Đặt hàng thành công');</script>";
            unset($_SESSION['alert']);
        }
    ?>
   <?php 
   if(isset($_SESSION['Ten_Dang_Nhap'])){
    include 'header_sau_khi_dang_nhap.php';
   }
   else {
    include 'header.php';
   }
   include 'slider.html';
   include 'product.php';
   include 'product2.php';
   include 'product3.php';
   include 'footer.html';
   ?> 



</body>
</html>