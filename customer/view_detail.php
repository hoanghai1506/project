<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    <title>Document</title>
    <style>
    .hedding {
        font-size: 20px;
        color: #ab8181;
    }

    .main-section {
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translate(-50%, 5%);
    }

    .left-side-product-box img {
        width: 100%;
    }

    .left-side-product-box .sub-img img {
        margin-top: 5px;
        width: 83px;
        height: 100px;
    }

    .right-side-pro-detail span {
        font-size: 15px;
    }

    .right-side-pro-detail p {
        font-size: 25px;
        color: #a1a1a1;
    }

    .right-side-pro-detail .price-pro {
        color: #E45641;
    }

    .right-side-pro-detail .tag-section {
        font-size: 18px;
        color: #5D4C46;
    }

    .pro-box-section .pro-box img {
        width: 100%;
        height: 200px;
    }

    @media (min-width:360px) and (max-width:640px) {
        .pro-box-section .pro-box img {
            height: auto;
        }
    }
    </style>
</head>

<body>
    <?php  
    if(isset($_SESSION['Ten_Dang_Nhap'])){

        require 'header_sau_khi_dang_nhap.php'; 
    } else {
        require 'header.php';
    }
        
        ?>
    <?php 
        require_once 'connect.php';
        $Ma_San_Pham=$_GET['Ma_San_Pham'];
        $sql="SELECT * 
            FROM san_pham as sp
            JOIN anh_san_pham as asp
                using(Ma_San_Pham)
            WHERE Ma_San_Pham='$Ma_San_Pham'";
        $result=mysqli_query($ketnoi,$sql);
    ?>
   
    <div class="container">
        <div class="col-lg-8 border p-3 main-section bg-white">
            <?php foreach($result as $each){?>
            <div class="row m-0">
                <div class="col-lg-4 left-side-product-box pb-3">
                    <img src="../admin/quan_ly_san_pham/anh/<?php echo $each['Anh']?>" class="border p-3">

                </div>
                <div class="col-lg-8">
                    <div class="right-side-pro-detail border p-3 m-0">
                        <div class="row">
                            <div class="col-lg-12">

                                <p class="m-0 p-0"><?php echo$each['Ten_San_Pham'] ?></p>
                            </div>
                            <div class="col-lg-12">
                                <p class="m-0 p-0 price-pro"><?php $gia=number_format($each['Gia'], 0, ",", ".");
                                echo $gia; ?></p>
                                <hr class="p-0 m-0">
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h5>Chi tiết sản phẩm</h5>
                                <span><?php echo$each['Mo_Ta'] ?></span>
                                <hr class="m-0 pt-2 mt-2">
                            </div>


                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <a href="Them_gio_hang_xu_ly.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>"
                                            class="btn btn-danger w-100">Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>