<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly san pham</title>
    <style>
    .btn_them {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 50px;
        height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        text-align: center;
        line-height: 30px;
    }

    .btn_them a {
        text-decoration: none;
        color: white;
    }

    .btn_xoa {
        width: 50px;
        height: 30px;
        background-color: rgba(231, 76, 60, 1.0);
        text-align: center;
        line-height: 30px;
    }

    .btn_sua {
        width: 50px;
        height: 30px;
        background-color: rgba(46, 204, 113, 1.0);
        text-align: center;
        line-height: 30px;
    }

    .btn_xoa a,
    .btn_sua a {
        text-decoration: none;
        color: white;
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
                    <li><a href="index.php">Trang chủ </a></li>
                    <li><a href="./admin/xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham.php?ma=0">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php?ma=0">Quản lý sản phẩm</a></li>
                            <li><a href="quanlyloaisanpham.php">Quản lý kho</a></li>
                            <li><a href="#">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <h2>Quản lý sản phẩm</h2>
        <div class="btn_them">
            <a href="themanhsp.php">Thêm</a>
        </div>
        <table>
            <tr>
                <td>Mã Sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh</td>
            </tr>
            <?php
            $ketnoi = mysqli_connect("localhost", "root", "", "project_web");
            mysqli_set_charset($ketnoi, 'utf8');


            $sql = "SELECT 
            sp.Ma_San_Pham,
            sp.Ten_San_Pham,
            asp.Anh 
            FROM anh_san_pham as asp
            INNER JOIN san_pham as sp
            ON asp.Ma_San_Pham = sp.Ma_San_Pham";
            $anh = mysqli_query($ketnoi, $sql);
            ?>
            <?php foreach ($anh as $each) { ?>
            <tr>

                <td><?php echo $each['Ma_San_Pham'] ?></td>
                <td><?php echo $each['Ten_San_Pham'] ?></td>
                <td><img width="100px" src="./anh/<?php echo $each['Anh'] ?>" alt="anh"></td>
                <td>
                    <div class="btn_xoa">
                        <a href="xoaanhsp.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham'] ?>">Xóa</a>
                    </div>
                </td>
                <td>
                    <div class="btn_sua">
                        <a href="#">Sửa</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
</body>

</html>