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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link rel="stylesheet" href="style.css">
    <title>Trang Quản lý sản phẩm</title>
    <style>
    .btn_back {
        width: 70px;
        height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        border-radius: 5px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    body {
        font-family: times, "Times New Roman", serif;
    }

    .btn_back a {
        line-height: 30px;
        color: white;
        text-decoration: none;
    }
    .xoa{
        width: 50px;
        height: 30px;
        background-color:rgba(231, 76, 60,1.0);
        text-align: center;
    }
    .sua{
        width: 50px;
        height: 30px;
        background-color:rgba(46, 204, 113,1.0);
        text-align: center;
    }
    .xoa a,.sua a{
        line-height: 30px;
        color: white;
        text-decoration: none;
    }
    .chi_tiet{
        background-color:rgba(236, 240, 241,1.0);
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
                    <li><a href="../quanlykhachhang.php">Trang chủ </a></li>
                    <li><a href="../xu_ly_nhan_vien./quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="../quanlykhachhang.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham.php?ma=0">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php?ma=0">Quản lý sản phẩm</a></li>
                            <li><a href="quanlyloaisanpham.php">Quản lý kho</a></li>
                            <li><a href="anhsp.php">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <h2>Quản lý sản phẩm</h2>
        <div class="btn_back">
            <a href="quanlysanpham.php?ma=0">
                <p>
                    << Quay lại</p>
            </a>
        </div>
        <?php
        $sql_locsanpham = "SELECT * FROM loai";
        $loaisanpham = mysqli_query($ketnoi, $sql_locsanpham);
        ?>
        <!-- <form action="locsanpham.php" method="post" >
        <select name="Ma_Loai" id="">
            <?php foreach ($loaisanpham as $locsanpham) { ?>
            <option value="<?php echo $locsanpham['Ma_Loai'] ?>">
                <?php echo $locsanpham['Ten_Loai'] ?>
                <?php $ma_loai = $locsanpham['Ma_Loai'] ?>
                
            </option>
            
            <?php } ?>
        </select>
        <button>Lọc</button> -->
        </form>

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
            $ma_loai = $_POST['Ma_Loai'];
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
        on sp.Ma_San_Pham = asp.Ma_San_Pham
        where sp.Ma_Loai = '$ma_loai'";
            $sanphm = mysqli_query($ketnoi, $sql);
            ?>
            <?php foreach ($sanphm as $each) { ?>
            <tr class="chi_tiet">
                <td><?php echo $each['Ma_San_Pham'] ?></td>
                <td><?php echo $each['Ma_Loai'] ?></td>
                <td><?php echo $each['Ten_San_Pham'] ?></td>
                <td><?php echo $each['So_Luong_Trong_Kho'] ?></td>
                <td><?php echo $each['Gia'] ?></td>
                <td><?php echo $each['Mo_ta'] ?></td>
                <td><img width="100px" src="./anh/<?php echo $each['Anh'] ?>" alt=""></td>
                <td>
                    <div class="xoa">
                        <a href="xoa_sp.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>">Xóa</a>
                    </div>
                </td>
                <td>
                    <div class="sua">
                        <a href="sua_sp.php?Ma_San_Pham=<?php echo $each['Ma_San_Pham']?>">Sửa</a>
                    </div>
                </td>
            </tr>

            <?php } ?>

        </table>
        <a href="them_sp.php">Thêm</a>
    </div>
</body>

</html>