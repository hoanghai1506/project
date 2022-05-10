<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly san pham</title>
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
            require_once("connect.php");
            $sql = "SELECT * FROM san_pham";
            $result = mysqli_query($ketnoi,$sql);
        ?>
    <form method="post" action="them_anh_xu_ly.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Mã Sản phẩm</td>
            <td>
                <select name="Ma_San_Pham">
                    <?php foreach($result as $each){ ?>
                        <option value="<?php echo $each['Ma_San_Pham'] ?>"><?php echo $each['Ten_San_Pham'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>anh</td>
            <td><input type="file" name="Anh"></td>
        </tr>
        <button>Thêm</button>
    </table>
            
    </form>
    </div>
</body>

</html>