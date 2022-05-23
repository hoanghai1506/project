<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .left {
            width: 30%;
            float: left;
            margin-left:10%;
        }
        .right {
            width: 60%;
            float: right;
        }
        h1{
            text-align: center;
            color:orange
        }
        h2{
            text-align: center;
            color:orange
        }
        .menu > li{
            list-style: none;
            display: block;
        }
        .menu{
            margin-left: 0;
            margin-right: 0;
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
            <a href="#">Thay đổi ảnh đại diện</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Thay Đổi mật khẩu</a></li>
                <li><a href="">Đơn hàng đã mua</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="right">
        <?php
            $Ten_Dang_Nhap=$_SESSION['Ten_Dang_Nhap'];
        ?>
        <form method="post" action="xu_ly_them_anh_dai_dien.php" enctype="multipart/form-data" >
            <input type="hidden" name='Ten_Dang_Nhap' value="<?php echo $Ten_Dang_Nhap?>">
            <input type="file" name ="Anh"><br>
            <button>Thay đổi</button>
        </form>
    </div>

</body>
</html>