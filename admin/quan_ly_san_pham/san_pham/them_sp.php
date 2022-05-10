<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly</title>
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
                    <li><a href="../xu_ly_nhan_vien">Quản lý nhân viên </a></li>
                    <li><a href="quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="#">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="#">Quản lý sản phẩm</a></li>
                            <li><a href="#">Quản lý kho</a></li>
                            <li><a href="#">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <?php
        require_once('connect.php');
        $sql = "SELECT * FROM loai";
        $loaisanpham = mysqli_query($ketnoi, $sql);
        ?>
        <form method="post" action="xu_ly_them_Sp.php">
            <table>
                <tr>
                    <td>Mã loại</td>
                    <td>
                        <select name="Ma_Loai">
                            <?php foreach ($loaisanpham as $each) { ?>
                                <option value="<?php echo $each['Ma_Loai'] ?>">
                                    <?php echo $each['Ten_Loai'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" name="Ten_San_Pham"></td>
                </tr>
                <tr>
                    <td>Số lượng trong kho</td>
                    <td><input type="number" name="So_Luong_Trong_Kho"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="text" name="Gia"></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="Mo_ta" id="" cols="30" rows="10"></textarea></td>
                </tr>

            </table>
            <button>thêm</button>
        </form>

    </div>
</body>

</html>