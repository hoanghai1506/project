<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly</title>
    <style>
    a {
        text-decoration: none;
        color: #000;
    }
    .buttom{
        width: 100px;
        height: 70px;
        background-color: rgba(52, 152, 219,1.0);
        text-align: center;
        
    }
    .buttom a{
        /* padding-top :35px;
        padding-bottom: 35px;
        padding-left:50px;
        padding-right:50px; */
        /* text-align: center; */
        line-height: 70px;
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
                    <li><a href="../trang_quan_ly.html">Trang chủ </a></li>
                    <li><a href="quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="#">Quản lý khách hàng</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="right">
        <h2>Thông tin nhân viên </h2>
        <div class="table">
            <table border="1" cellspacing="100%" width="900px">
                <tr>
                    <td>Mã nhân viên</td>
                    <td>Tên nhân viên</td>
                    <td>Địa chỉ</td>
                    <td>Ngày sinh</td>
                    <td>Số điện thoại</td>
                    <td>Tên đăng nhập</td>
                    <td>Mật khẩu</td>
                    <td>cấp độ nhân viên</td>
                </tr>
                <?php 
        require_once 'conect.php';
        
        mysqli_set_charset($ketnoi,'utf8');
        
        $sql= "SELECT 
        nv.Ma_Nhan_Vien,
        nv.Ten_Nhan_Vien,
        nv.Dia_Chi,
        nv.Ngay_Sinh,
        nv.So_Dien_Thoai,
        nv.Ten_Dang_Nhap,
        nv.Mat_Khau,
        gc.Ten_Cap_Do
        FROM nhan_vien as nv
        inner join ghi_chu_cap_do as gc
        on nv.Cap_Do = gc.Cap_do";
        
        $nhan_vien= mysqli_query($ketnoi,$sql);
        // mysqli.close($ketnoi);
        ?>
                <?php
        foreach($nhan_vien as $each) {
        ?>
                <tr>
                    <td><?php echo $each["Ma_Nhan_Vien"]; ?></td>
                    <td><?php echo $each["Ten_Nhan_Vien"]; ?></td>
                    <td><?php echo $each["Dia_Chi"]; ?></td>
                    <td><?php echo $each["Ngay_Sinh"]; ?></td>
                    <td><?php echo $each["So_Dien_Thoai"]; ?></td>
                    <td><?php echo $each["Ten_Dang_Nhap"]; ?></td>
                    <td><?php echo $each["Mat_Khau"]; ?></td>
                    <td>
                        <?php echo $each["Ten_Cap_Do"]; ?>
                    </td>
                    <td>
                           <a href="xoa.php?Ma_Nhan_Vien=<?php echo $each['Ma_Nhan_Vien']?>">Xóa nhân viên</a>
                    </td>
                    <td><a href="form_sua.php?Ma_Nhan_Vien=<?php echo $each['Ma_Nhan_Vien']?>">Sửa thông tin </a></td>
                </tr>
                <?php } 
                ?>
            </table>
        </div>
        <div class="buttom">
            <a href="form_insert.php">Thêm nhân viên</a>
        </div>
    </div>
</body>

</html>