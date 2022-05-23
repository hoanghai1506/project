<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a8994a5d4a.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .left {
        width: 400px;
        height: 700px;
        float: left;
        background-color: rgba(236, 240, 241, 1.0);
        margin-left:50px
    }

    .right {
        width: 50%;
        float: right;
        background-color: rgba(236, 240, 241, 1.0);
    }

    .left img {
        width: 100px;
        border-radius: 50px 50px 50px 50px;
        margin-top: 20px;
    }

    h1 {
        text-align: center;
        color: orange;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: orange
    }

    .menu>li {
        list-style: none;
        display: block;
    }


    .img_user {
        width: 200px;
        margin-left:auto;
        margin-right:auto;
    }
    ul li{
        list-style: none;
    }
    a{
        text-decoration: none;
        color:rgba(243, 156, 18,1.0);
    }
    </style>
</head>

<body>
    <?php
    include_once 'header_sau_khi_dang_nhap.php';
    ?>
    <!-- ----------------------------------- -->
    <h1>Tài Khoản</h1>
    <div class="left">
        <div class="img_user">
            <?php 
            require_once 'connect.php'; 
            $Ten_Dang_Nhap = $_SESSION['Ten_Dang_Nhap'];
            $sql_lay_anh = "SELECT  
            ak.Anh
            FROM khach_hang as kh
            join anh_Khach_hang as ak
            on kh.Ma_Khach_Hang = ak.Id_khach_hang
            where kh.Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
            $result_lay_anh = mysqli_query($ketnoi, $sql_lay_anh);
            ?>
            <?php foreach ($result_lay_anh as $each){ ?>
            <img src="./anh/<?php echo $each['Anh'] ?>" alt=""> <?php }?>
            <br>
            <a href="form_anh_dai_dien.php">Thêm ảnh đại diện</a>
            <br>
            <div class="menu">
                <br>
                <ul>
                    <li><i class="fa-duotone fa-lock"></i><a href="form_thay_doi_mk.php">Thay Đổi mật khẩu</a></li>
                    <li><a href="#">Đơn hàng đã mua</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="right">
        <h2>Thông tin cá nhân</h2>
        <hr>
        <?php 
        require_once 'connect.php';
        $Ten_Dang_Nhap= $_SESSION['Ten_Dang_Nhap'];
        $sql = "SELECT * FROM khach_hang WHERE `Ten_Dang_Nhap` = '$Ten_Dang_Nhap'";
        $result = mysqli_query($ketnoi, $sql);
        ?>
        <?php foreach ($result as $each){?>
        Họ và tên: <h4><?php echo $each['Ten_Khach_Hang']?></h4>
        Email: <h4><?php echo $each['Ten_Dang_Nhap'] ?></h4>
        <?php } ?>
    </div>

</body>

</html>