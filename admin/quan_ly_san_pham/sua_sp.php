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
    textarea {

        width: 798px;
        height: 358px;

    }
    button{
        width: 50px;
        height: 30px;
        background-color: rgba(52, 152, 219,1.0);
        text-align: center;
        margin-top: 20px;
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
                    <li><a href="#">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
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
        <?php 
        $Ma_San_Pham = $_GET['Ma_San_Pham'];
        require_once('connect.php');
        $sql = "SELECT * FROM san_pham WHERE Ma_San_Pham = $Ma_San_Pham";
        $san_pham=mysqli_query($ketnoi,$sql);
        ?>
        <?php
         require_once('connect.php');
        $sql = "SELECT * FROM loai";
        $result = mysqli_query($ketnoi,$sql);
        ?>
        <?php foreach($san_pham as $each1){ ?>
        <form method="post" action="xu_ly_su_sp.php">
            <table>
                <tr>
                    <td><input type="hidden" name="Ma_San_Pham" value="<?php echo $Ma_San_Pham ?>"></td>
                </tr>
                <tr>
                    <td>Loại Sản Phẩm</td>
                    <td>

                        <select name="Ma_Loai" id="">
                            <?php foreach($result as $each) { ?>
                            <option value="<?php echo $each['Ma_Loai']?>"><?php echo $each['Ten_Loai']?></option>
                            <?php   } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm:</td>
                    <td><input type="text" name="Ten_San_Pham" id="Ten_San_Pham"
                            value="<?php echo $each1['Ten_San_Pham'] ?>"></td>
                </tr>
                <tr>
                    <td>Số lượng trong kho</td>
                    <td><input type="text" name="So_Luong_Trong_Kho"
                            value=" <?php echo $each1['So_Luong_Trong_Kho'] ?>"></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input type="text" name="Gia" value=" <?php echo$each1['Gia'] ?>"></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="Mo_ta" id="" cols="30" rows="10"><?php echo $each1['Mo_Ta']?></textarea></td>
                </tr>

            </table>
            <button>sửa</button>
        </form>
        <?php } ?>
    </div>
</body>

</html>