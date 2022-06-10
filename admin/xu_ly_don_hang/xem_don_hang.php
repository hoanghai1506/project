<?php
$ketnoi = mysqli_connect("localhost", "root", "", "project_web");
mysqli_set_charset($ketnoi, 'utf8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang quản lý đơn hàng</title>
</head>

<body>
    <div class="top">
        <h1> Chào mừng đến với trang quản lý</h1>
    </div>
    <div class="left">
        <div class="navigation">
            <div class="nav">
                <ul>
                    <li><a href="../trang_quan_ly.html">Trang chủ </a></li>
                    <li><a href="../xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="../quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="../quan_ly_san_pham/quanlysanpham.php">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
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
        <table>
            <tr>

                <td>Tên Khách Hàng </td>
                <td>Số Điện Thoại</td>
                <td>Ảnh</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng</td>
                <td>Giá</td>
                <td>Ngày đặt</td>
                <td>Tổng tiền</td>
            </tr>
            <?php
            $Ma_Hoa_Don=$_GET["Ma_Hoa_Don"];
        $ketnoi = mysqli_connect("localhost", "root", "", "project_web");
        mysqli_set_charset($ketnoi, 'utf8');
        $sql = "SELECT  
        hd.Ma_Hoa_Don,
        kh.Ten_Khach_Hang,
        kh.So_Dien_Thoai,
        sp.Ten_San_Pham,
        asp.Anh,
        hdc.So_Luong,
        hdc.Gia,
        hd.Ngay,
        hd.Trang_Thai

        FROM hoa_don as hd
        join khach_hang as kh
            using(Ma_Khach_Hang)
        join hoa_don_chi_tiet as hdc
            using(Ma_Hoa_Don)
        join san_pham as sp
            on hdc.Ma_San_Pham = sp.Ma_San_Pham
        join anh_san_pham as asp
            on sp.Ma_San_Pham = asp.Ma_San_Pham
        WHERE hd.Ma_Hoa_Don = $Ma_Hoa_Don";
        $result = mysqli_query($ketnoi, $sql);
        $tong=0;
        $sum =0;
        ?>
         <?php foreach ($result as $each) { ?>
                <tr>
                    <td><?php echo $each['Ten_Khach_Hang'] ?></td>
                    <td><?php echo $each['So_Dien_Thoai'] ?></td>
                    <td><img src="../quan_ly_san_pham/anh/<?php echo $each['Anh'] ?>" alt="" width="100px" height="100px"></td>
                    <td><?php echo $each['Ten_San_Pham'] ?></td>
                    <td><?php echo $each['So_Luong'] ?></td>
                    <td><?php echo $each['Gia'] ?></td>
                    <td><?php echo $each['Ngay'] ?></td>
                    <td><?php  $tong=$each['Gia'] * $each['So_Luong']; echo $tong; ?></td> 
                    <?php $sum +=$tong  ?>            
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="8">Thành Tiền: <?php echo $sum ?></td>
                </tr>
            </table>
            
        
    </div>
</body>

</html>