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
                    <li><a href="../xu_ly_nhan_vien">Quản lý nhân viên </a></li>
                    <li><a href="quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham.php">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="#">Quản lý sản phẩm</a></li>
                            <li><a href="quanlyloaisanpham.php">Quản lý kho</a></li>
                            <li><a href="anhsp.php">Quản lý ảnh sản phẩm</a></li>
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
                <td>Mã sản phẩm</td>
                <td>Mã loại</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng trong kho</td>
                <td>Giá</td>
                <td>Mô tả</td>
                <td>Ảnh</td>
            </tr>
            <?php
        $ketnoi = mysqli_connect("localhost","root","","project_web");
        mysqli_set_charset($ketnoi,'utf8');


        $sql = "SELECT 
        sp.Ma_San_Pham,
        sp.Ma_Loai,
        sp.Ten_San_Pham,
        sp.So_Luong_Trong_Kho,
        sp.Gia,
        sp.Mo_ta,
        asp.Anh 
        FROM san_pham as sp
        left join anh_san_pham as asp 
        on sp.Ma_San_Pham = asp.Ma_San_Pham";
        $sanphm= mysqli_query($ketnoi,$sql);
        ?>
        <?php foreach($sanphm as $each){ ?>
            <tr>
                
                <td><?php echo $each['Ma_San_Pham'] ?></td>
                <td><?php echo $each['Ma_Loai'] ?></td>
                <td><?php echo $each['Ten_San_Pham'] ?></td>
                <td><?php echo $each['So_Luong_Trong_Kho'] ?></td>
                <td><?php echo $each['Gia'] ?></td>
                <td><?php echo $each['Mo_ta']?></td>
                <td><img width="100px" src="./anh/<?php echo $each['Anh'] ?>" alt=""></td>
                <td><a href="xoa_sp.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>">Xóa</a></td>
                <td><a href="sua_sp.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>">Sửa</a></td>
            </tr>
            
        <?php }?>
        
        </table>
            <a href="them_sp.php">Thêm</a>
    </div>
</body>

</html>