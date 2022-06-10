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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <title>Trang quản lý đơn hàng</title>
    <style>
    .huy {
        width: 50px;
        height: 30px;
        background-color: red;
        text-align: center;
    }

    .huy a,
    .duyet a,
    .xem a {
        text-decoration: none;
        color: black;
        line-height: 30px
    }

    .duyet {
        width: 50px;
        height: 30px;
        background-color: green;
        text-align: center;
    }
    .xem{
        width: 50px;
        height: 30px;
        background-color: blue;
        text-align: center;
    }
    .chi_tiet{
        background-color:white;
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
                    <li><a href="../trang_quan_ly.php">Trang chủ </a></li>
                    <li><a href="../xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="../quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="../quan_ly_san_pham/quanlysanpham.php?ma=2">Quản lý sản phẩm</a>
                    </li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <table>
            <tr>
                <td>Mã hóa đơn</td>
                <td>Tên Khách Hàng </td>
                <td>Số Điện Thoại</td>
                <td>Ngày đặt</td>
                <td>Trạng thái</td>
                <td>Hàng động</td>
            </tr>
            <?php
            $ketnoi = mysqli_connect("localhost", "root", "", "project_web");
            mysqli_set_charset($ketnoi, 'utf8');
            $sql = "SELECT  
                hd.Ma_Hoa_Don,
                hd.Ngay,
                kh.Ten_Khach_Hang as Ten_Khach_Hang,
                kh.So_Dien_Thoai as So_Dien_Thoai,
                hd.Trang_Thai
            FROM hoa_don as hd
            join khach_hang as kh
                using(Ma_Khach_Hang)";
            $result = mysqli_query($ketnoi, $sql);
            ?>
            <?php foreach ($result as $each) { ?>
            <tr class="chi_tiet">
                <td><?php echo $each['Ma_Hoa_Don'] ?></td>
                <td><?php echo $each['Ten_Khach_Hang'] ?></td>
                <td><?php echo $each['So_Dien_Thoai'] ?></td>
                <td><?php echo $each['Ngay'] ?></td>
                <td><?php 
                    if($each['Trang_Thai']==1){
                        echo "Đã duyệt";
                    }else if($each['Trang_Thai']==0){
                        echo "Chưa duyệt";
                    } else {
                        echo "Đã hủy";
                    }
                ?></td>
                <td>
                    <div class="xem">
                        <a href="xem_don_hang.php?Ma_Hoa_Don=<?php echo $each['Ma_Hoa_Don'] ?>">xem</a>
                    </div>
                </td>
                <?php if($each['Trang_Thai']==0){  ?>
                <td>
                    <div class="huy">

                        <a
                            href="update_tinh_trang.php?Ma_Hoa_Don=<?php echo $each['Ma_Hoa_Don'] ?>&Trang_Thai=2">Hủy</a>
                    </div>
                </td>
                <td>
                    <div class="duyet">

                        <a
                            href="update_tinh_trang.php?Ma_Hoa_Don=<?php echo $each['Ma_Hoa_Don'] ?>&Trang_Thai=1">Duyệt</a>
                    </div>
                </td>
                <?php } else{?>
                    <td></td>
                    <td></td>
                <?php }?>
            </tr>
            <?php } ?>
        </table>


    </div>
</body>

</html>