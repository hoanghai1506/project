
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Roboto Flex', sans-serif !important;
        }
        .img_product{
            width : 390px;
            height: 400px;
            background-color: #f1f1f1;
            margin-top: 40px;
            margin-left: 120px;
            float: left;
        }
        .product_info{
            width: 700px;
            height: 400px;
            background-color: #f1f1f1;
            margin-top: 40px;
            margin-left: 20px;
            float: left;
        }
        .img_product img{
            width: 390px;
            height: 400px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
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
    <?php 
    require_once 'header_sau_khi_dang_nhap.php';
    ?>
    <div class="conterner">
        <div class="img_product">
            <?php foreach($result as $layanh) {?>
            <img src="../admin/quan_ly_san_pham/anh/<?php echo $layanh['Anh']?>" alt="">
            <?php } ?>
        </div>
        <?php foreach($result as $each){ ?>
        <div class="product_info">
            <h3><?php echo $each['Ten_San_Pham'] ?></h3>
            <p><?php echo$each['Mo_ta'] ?></p>
            <p>Giá:<?php echo$each['Gia'] ?></p>
            <p>số lượng</p><input type="number" name="" id="">
        </div>
        <?php } ?>
    </div>
</body>
</html>