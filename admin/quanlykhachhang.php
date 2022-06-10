<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
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
                    <li><a href="trang_quan_ly.php">Trang chủ </a></li>
                    <li><a href="./xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="#">Quản lý khách hàng</a></li>
                    <li><a href="./quan_ly_san_pham/quanlysanpham.php?ma=0">Quản lý sản phẩm</a>
                    </li>
                    <li><a href="./xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                    <li><a href="#">Quản lý thống kê</a></li>
                    <li class="logout"><a href="logout.php">Đăng xuất</a></li>
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
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>