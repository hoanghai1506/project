<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Trang Sản Phẩm nam</title>
    <style>
    /*  SECTIONS  */
    .section {
        clear: both;
        padding: 0px;
        margin: 0px;
    }

    h1 {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        color: orange;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /*  COLUMN SETUP  */
    .col {
        display: block;
        float: left;
        margin: 1% 0 1% 1.6%;
    }

    .col:first-child {
        margin-left: 0;
    }

    /*  GROUPING  */
    .group:before,
    .group:after {
        content: "";
        display: table;
    }

    .group:after {
        clear: both;
    }

    .group {
        zoom: 1;
        /* For IE 6/7 */
    }

    /*  GRID OF FIVE  */
    .span_5_of_5 {
        width: 100%;
    }

    .span_4_of_5 {
        width: 79.68%;
    }

    .span_3_of_5 {
        width: 59.36%;
    }

    .span_2_of_5 {
        width: 39.04%;
    }

    .span_1_of_5 {
        width: 18.72%;
    }

    /*  GO FULL WIDTH BELOW 480 PIXELS */
    @media only screen and (max-width: 480px) {
        .col {
            margin: 1% 0 1% 0%;
        }

        .span_1_of_5,
        .span_2_of_5,
        .span_3_of_5,
        .span_4_of_5,
        .span_5_of_5 {
            width: 100%;
        }
    }

    img {
        width: 70%;
        height: auto;
        margin-left: 0;
        margin-right: 0;
    }

    a {
        text-decoration: none;
        color: black;
    }

    div .col {
        word-wrap: break-word;
        text-align: center
    }

    .col {
        float: left;
    }
    </style>
</head>

<body>

    <?php require_once 'header.php'; ?>
    <?php
    require_once 'connect.php';
    $loai = $_GET['Ma_Loai'];
    $sql = "SELECT * 
        FROM san_pham as sp
        JOIN anh_san_pham as asp
            using(Ma_San_Pham)
        JOIN loai as lo
            using(Ma_Loai)
        WHERE Ma_Loai = $loai";
    $result = mysqli_query($ketnoi, $sql);
    $sql_ten_loai = "SELECT * FROM loai WHERE Ma_Loai = $loai";
    $result_ten_loai = mysqli_query($ketnoi, $sql_ten_loai);
    ?>
    <?php foreach ($result_ten_loai as $ten_sp){?>
    <h1>Sản phẩm <?php echo$ten_sp['Ten_Loai'] ?></h1>
    <?php } ?>
    <div class="section group">
        <?php foreach ($result as $row) { ?>
        <div class="col span_1_of_5">
            <a href="chi_tiet_san_pham.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>"> <img
                    src="../admin/quan_ly_san_pham/anh/<?php echo $row['Anh'] ?>" alt=""></a>
            <p><a
                    href="chi_tiet_san_pham.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>"><?php echo $row['Ten_San_Pham'] ?></a>
            </p>
            <p>Giá:<?php echo $row['Gia'] ?></p>
            <a href="Them_gio_hang_xu_ly.php?Ma_San_Pham=<?php echo$row['Ma_San_Pham'] ?>&Ma_Loai=<?php echo$row['Ma_Loai'] ?>&type=trang_toan_bo_sp"><i class="fa fa-shopping-cart" style="font-size:25px;color:orange"></i></a>
        </div>
        <?php } ?>
    </div>
    <?php include'footer.html' ?>
</body>

</html>