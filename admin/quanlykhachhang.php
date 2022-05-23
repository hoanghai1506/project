<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly</title>
    <style>
    a {
        text-decoration: none;
        color: #000;
    }
    </style>
</head>

<body>
    <div class="top">
        <h1> Chào mừng đến với trang quản lý</h1>
    </div>
    <div class="left">
        <div class="navigation">
            <div class="nav">
                <ul>
                    <li><a href="index.html">Trang chủ </a></li>
                    <li><a href="quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="#">Quản lý khách hàng</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="center">

    </div>
    <div class="right">
        <h2>Thông tin khách hàng </h2>
        <div class="table">
            <table border="1" cellspacing="100%" width="900px">
                <tr>
                    <td>Mã khách hàng</td>
                    <td>Tên khách hàng</td>
                    <td>Địa chỉ</td>
                    <td>Ngày sinh</td>
                    <td>Số điện thoại</td>
                    <td>Tên đăng nhập</td>
                    <td>Mật khẩu</td>
                </tr>
                <?php 
        // require_once 'conect.php';
        
        $ketnoi = mysqli_connect("localhost","root","","project_web");
        mysqli_set_charset($ketnoi,'utf8');
        
        $sql= "SELECT * FROM khach_hang";
        
        $khach_hang= mysqli_query($ketnoi,$sql);
        ?>
                <?php
        foreach($khach_hang as $each) {
        ?>
                <tr>
                    <td><?php echo $each["Ma_Khach_Hang"]; ?></td>
                    <td><?php echo $each["Ten_Khach_Hang"]; ?></td>
                    <td><?php echo $each["Dia_Chi"]; ?></td>
                    <td><?php echo $each["Ngay_Sinh"]; ?></td>
                    <td><?php echo $each["So_Dien_Thoai"]; ?></td>
                    <td><?php echo $each["Ten_Dang_Nhap"]; ?></td>
                    <td><?php echo $each["Mat_Khau"]; ?></td>
                    <td><a href="./xu_ly_khach_hang/xoakhachhang.php?Ma_Khach_Hang=<?php echo $each['Ma_Khach_Hang']?>">Xóa</a></td>
                    <td><a href="#">Sửa</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>