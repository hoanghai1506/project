<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Lịch sử mua hàng</title>
    <style>
    .shopping-cart {
        padding-bottom: 50px;
        font-family: 'Montserrat', sans-serif;
    }

    .shopping-cart.dark {
        background-color: #f6f6f6;
    }

    .shopping-cart .content {
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        background-color: white;
    }

    .shopping-cart .block-heading {
        padding-top: 50px;
        margin-bottom: 40px;
        text-align: center;
    }

    .shopping-cart .block-heading p {
        text-align: center;
        max-width: 420px;
        margin: auto;
        opacity: 0.7;
    }

    .shopping-cart .dark .block-heading p {
        opacity: 0.8;
    }

    .shopping-cart .block-heading h1,
    .shopping-cart .block-heading h2,
    .shopping-cart .block-heading h3 {
        margin-bottom: 1.2rem;
        color: #3b99e0;
    }

    .shopping-cart .items {
        margin: auto;
    }

    .shopping-cart .items .product {
        margin-bottom: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .shopping-cart .items .product .info {
        padding-top: 0px;
        text-align: center;
    }

    .shopping-cart .items .product .info .product-name {
        font-weight: 600;
    }

    .shopping-cart .items .product .info .product-name .product-info {
        font-size: 14px;
        margin-top: 15px;
    }

    .shopping-cart .items .product .info .product-name .product-info .value {
        font-weight: 400;
    }

    .shopping-cart .items .product .info .quantity .quantity-input {
        margin: auto;
        width: 80px;
    }

    .shopping-cart .items .product .info .price {
        margin-top: 15px;
        font-weight: bold;
        font-size: 22px;
    }

    .shopping-cart .summary {
        border-top: 2px solid #5ea4f3;
        background-color: #f7fbff;
        height: 100%;
        padding: 30px;
    }

    .shopping-cart .summary h3 {
        text-align: center;
        font-size: 1.3em;
        font-weight: 600;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .shopping-cart .summary .summary-item:not(:last-of-type) {
        padding-bottom: 10px;
        padding-top: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .shopping-cart .summary .text {
        font-size: 1em;
        font-weight: 600;
    }

    .shopping-cart .summary .price {
        font-size: 1em;
        float: right;
    }

    .shopping-cart .summary button {
        margin-top: 20px;
    }

    @media (min-width: 768px) {
        .shopping-cart .items .product .info {
            padding-top: 25px;
            text-align: left;
        }

        .shopping-cart .items .product .info .price {
            font-weight: bold;
            font-size: 22px;
            top: 17px;
        }

        .shopping-cart .items .product .info .quantity {
            text-align: center;
        }

        .shopping-cart .items .product .info .quantity .quantity-input {
            padding: 4px 10px;
            text-align: center;
        }
    }

    /* .so_luong {
        width: 100px;
        height: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding-left: 5px;
    } */
    .decre {
        width: 25%;
        float: left;
    }

    .so_luong_hien {
        width: 50%;
        float: left;
    }

    .incre {
        width: 25%;
        float: left;
    }

    .color_d {
        width: 10px;
        height: 10px;
        color: red;
    }

    .decre a,
    .incre a {
        text-decoration: none;
        color: rgba(52, 152, 219, 1.0);
    }

    .page {
        margin-top: 200px;
    }

    .row {
        margin-top: 20px;
    }
    .btn a{
        text-decoration: none;
        color: white;
    }
    </style>
</head>

<body>
    <?php require_once 'header_sau_khi_dang_nhap.php' ?>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Lịch sử mua hàng</h2>
                </div>
                <?php
                   
                    if(isset($_SESSION['Ten_Dang_Nhap'])){

                        $Ten_Dang_Nhap =$_SESSION['Ten_Dang_Nhap'];
                    } else {
                        echo "<script>alert('Bạn chưa đăng nhập');</script>";
                    }
                    require 'connect.php';
                    $sql = "SELECT  
                    hd.Ma_Hoa_Don,
                    kh.Ten_Khach_Hang,
                    kh.So_Dien_Thoai,
                    sp.Ten_San_Pham,
                    asp.Anh,
                    hdc.So_Luong,
                    hdc.Gia,
                    hd.Ngay,
                    hd.Trang_Thai
                    FROM hoa_don as hd
                    join khach_hang as kh
                        using(Ma_Khach_Hang)
                    join hoa_don_chi_tiet as hdc
                        using(Ma_Hoa_Don)
                    join san_pham as sp
                        on hdc.Ma_San_Pham = sp.Ma_San_Pham
                    join anh_san_pham as asp
                        on sp.Ma_San_Pham = asp.Ma_San_Pham
                    ";
                    $result = mysqli_query($ketnoi, $sql);
                ?>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <?php foreach ($result as $each){?>
                                    <div class="row">
                                        <?php
                                        $tong_tien_1=0;
                                        $tong_tien_2 =0; 
                                        ?>

                                        <div class="col-md-3">
                                            <img class="img-fluid mx-auto d-block image"
                                                src="../admin/quan_ly_san_pham/anh/<?php echo $each['Anh'] ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="col-md-5 product-name">
                                                        <div class="product-name">
                                                            <a ><?php echo $each['Ten_San_Pham'] ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 quantity">
                                                        <label for="quantity">Tình trạng:</label>
                                                        <div class="so_luong">
                                                            
                                                            <div class="so_luong_hien">
                                                                <p><?php 
                                                                    if($each['Trang_Thai']==1){
                                                                        echo "Đã duyệt";
                                                                    }else if($each['Trang_Thai']==0){
                                                                        echo "Chưa duyệt";
                                                                    } else {
                                                                        echo "Đã hủy";
                                                                    }
                                                                ?></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 price">
                                                        <span> Giá <br> <?php  
                                                                        $gia = $each['Gia'] * $each['So_Luong'];
                                                                        $tong_tien_1 +=$gia;
                                                                        $gia = number_format($gia, 0, ",", ".");
                                                                        echo $gia;
                                                                        // echo$each['Gia'] 
                                                                        ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>