<?php
    require_once '../check_nv.php';
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

    <title>Trang quản lý sản phẩm</title>
    <style>
        .chi_tiet{
            background-color:rgba(236, 240, 241,1.0);
        }
        .btn{
            /* background-color:rgba(52, 152, 219, 1.0); */
            border-radius: 5px;
            text-align: center;
        }
        .btn_xoa{
            width: 50px;
            height: 30px;
            line-height: 30px;
            background-color:rgba(231, 76, 60,1.0);
            text-align: center;
        }
        .btn_sua{
            width: 50px;
            height: 30px;
            line-height: 30px;
            background-color:rgba(46, 204, 113,1.0);
            text-align: center;
        }
        .btn_them{
            width: 50px;
            height: 30px;
            margin-top: 1rem;
            line-height: 30px;
            background-color:rgba(52, 152, 219,1.0);
            text-align: center;
        }
        .btn_xoa a,
        .btn_sua a,
        .btn_them a{
            color: white;
            text-decoration: none;
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
                    <li><a href="trang_quan_ly.html">Trang chủ </a></li>
                    <li><a href="../xu_ly_nhan_vien/quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham.php?ma=2">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php?ma=2">Quản lý sản phẩm</a></li>
                            <li><a href="quanlyloaisanpham.php">Quản lý kho</a></li>
                            <li><a href="anhsp.php">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                    <li><a href="#">Quản lý thống kê</a></li>
                    <li class="logout"><a href="logout.php">Đăng xuất</a></li>
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
            <tr class="chi_tiet">

                <td><?php echo $each['Ma_Loai'] ?></td>
                <td><?php echo $each['Ten_Loai'] ?></td>
                <td>
                    <div class="btn_xoa">
                        <a onclick="return confim_del();" href="xoa_loai_sp.php?Ma_Loai=<?php echo $each['Ma_Loai'] ?>">Xóa</a>
                    </div>
                </td>
                <td>
                    <div class="btn_sua">
                        <a href="#">Sửa</a>
                    </div>
                </td>
            </tr>
            <?php }?>


        </table>
        <div class="btn_them">
            <a href="themloaisanpham.php">thêm</a>
        </div>
    </div>
    <script>
        function confim_del() {
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>