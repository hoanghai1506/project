<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
    * {
        margin: 0;
        padding: 0;
        scroll-padding-top: 2rem;
        scroll-behavior: smooth;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    .container_1 {
        max-width: 1068px;
        margin: auto;
        width: 100%;
    }

    section {
        padding: 4rem 0 3rem;
    }

    img {
        width: 200px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 1rem;
        color:orange;
        text-transform: uppercase;
    }

    .shop {
        margin-top: 2rem;
    }

    .shop-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, auto));
        grid-gap: 1rem;
    }

    .product-box {
        position: relative;
    }

    .product-box:hover {
        padding: 5px;
        border: 10px solid var(--text-color);
        transition: 0.4s;
    }

    .product-img {
        width: 200px;
        height: auto;
        margin-bottom: 0.5rem;
    }

    .product-title {
        font-size: 1.0rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .price {
        font-weight: 500;
        margin-top: 30px;
    }

    .add-cart {
        position: absolute;
        bottom: 0;
        right: 0;
        background: rgba(52, 152, 219, 1.0);
        color: orange;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 50px;
    }

    .add-cart:hover {
        background: rgba(52, 152, 219, 0.8);
    }
    .view_all {
            height: 40px;
            width: 160px;
            background-color: orange;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
     a {
            text-decoration: none;
            color: black !important;
        }
    </style>
</head>

<body>
    <?php 
        require_once 'connect.php';
        $sql = "SELECT * 
                    FROM san_pham as sp
                    JOIN anh_san_pham as a
                    USING(Ma_San_Pham)
                    where sp.Ma_Loai = 2
                    ORDER BY sp.Ma_San_Pham DESC
                    LIMIT 1,8";
        $result = mysqli_query($ketnoi, $sql);
    
    ?>
    <section class="shop container_1">

        <h2 class="section-title" >sản phẩm nam</h2>
        <!-- Content -->
        <div class="shop-content">
            <!--  -->
            <?php foreach ($result as $each) {?>
            <div class="product-box">

                <a href="view_detail.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham'] ?>"><img src="../admin/quan_ly_san_pham/anh/<?php echo $each['Anh'] ?>" alt="" class="product-img"></a>
               <h2 class="product-title" ><a href="view_detail.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham'] ?>"><?php echo $each['Ten_San_Pham']?></a></h2>
               Giá: <span class="price"><?php
                 $gia = number_format($each['Gia'], 0, ",", ".");
                 echo $gia;
                 ?></span>
                <a href="Them_gio_hang_xu_ly.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>"><i class='bx bxs-cart-add add-cart'></i></a>
            </div>
            <?php } ?>

        </div>
    </section>
    <div class="view_all">
        <?php foreach ($result as $loaisanpham) { ?>
            <a href="view_all_product.php?Ma_Loai=<?php echo $loaisanpham['Ma_Loai'] ?>">
            <?php } ?> <span>Xem tất cả sản phẩm</span> </a>
    </div>

</body>

</html>