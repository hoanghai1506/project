<?php 
    require_once 'check_nv.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <title>Trang Quan ly</title>
    <style>
        .logout {
            float: right;
            margin-right: 10px;
        }
    </style>
</head>

<body>
<?php

        if(isset($_SESSION['error'])){
            echo "<script>alert('Bạn không có quyền truy cập');</script>";
            unset($_SESSION['error']);
        } 
    ?>
    <div class="top">
        <h1> Chào mừng đến với trang quản lý</h1>
    </div>
    <div class="left">
        <div class="navigation">
            <div class="nav">
                <ul>
                    <li><a href="#">Trang chủ </a></li>
                    <li><a href="./xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="./quan_ly_san_pham/quanlysanpham.php?ma=0">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="./quan_ly_san_pham/san_pham/quanlysanpham.php?ma=0">Quản lý sản phẩm</a></li>
                            <li><a href="./quan_ly_san_pham/san_pham/quanlyloaisanpham.php">Quản lý kho</a></li>
                            <li><a href="./quan_ly_san_pham/san_pham/anhsp.php">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="./xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                    <li><a href="#">Quản lý thống kê</a></li>
                    <li class="logout"><a href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <h2>Thống kê doanh số</h2>
    </div>
</body>

</html>