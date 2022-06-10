<?php 
    require '../check_ql.php';
?>
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
    .buttom{
        width: 100px;
        height: 50px;
        background-color: rgba(52, 152, 219,1.0);
        text-align: center;
        margin-top: 20px;
        
    }
    .buttom a{
        line-height: 50px;
    }
    .xoa {
        width: 50px;
        height: 30px;
        background-color: rgba(231, 76, 60, 1.0);
        text-align: center;
    }

    .sua {
        width: 50px;
        height: 30px;
        background-color: rgba(46, 204, 113, 1.0);
        text-align: center;
    }

    .xoa a,
    .sua a {
        line-height: 30px;
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
                    <li><a href="../trang_quan_ly.php">Trang chủ </a></li>
                    <li><a href="#">Quản lý nhân viên </a></li>
                    <li><a href="../quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="../quan_ly_san_pham/quanlysanpham.php?ma=2">Quản lý sản phẩm</a>
                    </li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                    <li><a href="#">Quản lý thống kê</a></li>
                    <li class="logout"><a href="../logout.php">Đăng xuất</a></li>
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
                    <td>trạng thái hoạt động</td>
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
        nv.Trang_Thai,
        nv.Cap_Do
        FROM nhan_vien as nv";
        
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
                    <td><?php 
                    $ngay_sinh=date_format(date_create($each["Ngay_Sinh"]),"d/m/Y");
                    echo $ngay_sinh; 
                    ?></td>
                    <td><?php echo $each["So_Dien_Thoai"]; ?></td>
                    <td><?php echo $each["Ten_Dang_Nhap"]; ?></td>
                    <td><?php echo $each["Mat_Khau"]; ?></td>
                    <td>
                        <?php 
                        if($each["Cap_Do"]==1){
                            echo "Quản lý";
                        }
                        else {
                            echo "Nhân viên";
                        }
                        ?>
                    </td>
                    <td>
                        <?php  
                            if($each["Trang_Thai"]==1){
                                echo "đang làm";}
                            else{ echo "đã nghỉ";}
                        
                        ?>
                    </td>
                    <?php if($each['Trang_Thai']==1){ ?>
                    <td>
                        <div class="xoa">

                            <a onclick= "return confirm_del()" href="xoa.php?Ma_Nhan_Vien=<?php echo $each['Ma_Nhan_Vien']?>&Trang_Thai=0">Xóa </a>
                        </div>
                    </td>
                    <td>
                        <div class="sua">

                            <a href="form_sua.php?Ma_Nhan_Vien=<?php echo $each['Ma_Nhan_Vien']?>">Sửa  </a>
                        </div>
                    </td>
                    <?php } ?>
                </tr>
                <?php } 
                ?>
            </table>
        </div>
        <div class="buttom">
            <a href="form_insert.php">Thêm nhân viên</a>
        </div>
    </div>
    <script>
        function confirm_del() {
            return confirm("Bạn có chắc chắn muốn xóa nhân viên này không?");
            console.log("ok");
        }
    </script>
</body>

</html>