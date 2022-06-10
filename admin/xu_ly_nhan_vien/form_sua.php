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
    <title>Document</title>
</head>

<body>
    <div class="top">
        <h1> Chào mừng đến với trang quản lý</h1>
    </div>
    <div class="left">
        <div class="navigation">
            <div class="nav">
                <ul>
                    <li><a href="../quanlykhachhang.php">Trang chủ </a></li>
                    <li><a href="../xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="../quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="../quan_ly_san_pham/quanlysanpham.php">Quản lý sản phẩm</a></li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="center">
        <?php
        $Ma_Nhan_Vien=$_GET['Ma_Nhan_Vien'];
        require_once 'conect.php';
        $sql = "select * from nhan_vien where Ma_Nhan_Vien='$Ma_Nhan_Vien'";
        $nhan_vien = mysqli_query($ketnoi, $sql);
        ?>
    </div>
    <div class="right">
        <h2>Thông tin nhân viên </h2>
        <?php 
        foreach ($nhan_vien as $each){
        ?>

        <form method="post" action="xulysua.php">
            <table>
                <tr>
                    <td><input type="hidden" name="Ma_Nhan_Vien" value="<?php echo $Ma_Nhan_Vien?>"></td>
                </tr>
                <tr>
                    <td>Tên nhân viên</td>
                    <td><input type="text" name="Ten_Nhan_Vien" id="Ten_Nhan_Vien" <?php echo $each['Ten_Nhan_Vien']?>>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="Dia_Chi" id="Dia_Chi" <?php echo $each['Dia_Chi'] ?>></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="So_Dien_Thoai" id="So_Dien_Thoai" <?php echo $each['So_Dien_Thoai']?>>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="Ngay_Sinh" id="Ngay_Sinh" <?php echo $each['Ngay_Sinh']?>></td>
                </tr>
                <tr>
                    <button class="button" type="submit">Thêm</button>
                </tr>
                <tr>
            </table>
        </form>
        <?php } ?>
    </div>
</body>

</html>