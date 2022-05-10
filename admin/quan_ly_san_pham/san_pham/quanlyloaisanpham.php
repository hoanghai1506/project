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
        <h2>Quản lý sản phẩm</h2>
        <table>
            <tr>
                <td>Mã Loại</td>
                <td>Tên loại</td>
            </tr>
            <?php
        $ketnoi = mysqli_connect("localhost","root","","project_web");
        mysqli_set_charset($ketnoi,'utf8');


        $sql = "SELECT * FROM loai";
        $loaisanpham= mysqli_query($ketnoi,$sql);
        ?>
        <?php foreach($loaisanpham as $each){ ?>
            <tr>
                
                <td><?php echo $each['Ma_Loai'] ?></td>
                <td><?php echo $each['Ten_Loai'] ?></td>
                <td><a>Xóa</a></td>
                <td><a href="#">Sửa</a></td>
            </tr>
        <?php }?>
            
        
        </table>
            <a href="../loai_san_pham/themloaisanpham.php">thêm</a>
    </div>
</body>

</html>