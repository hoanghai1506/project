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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap Css -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Trang Quan ly san pham</title>
    <style>
    button {
        margin-top: 20px;
        margin-bottom: 10px;
        width: 50px;
        height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        text-align: center;
        line-height: 30px;
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
                    <li><a href="quanlysanpham.php">Quản lý sản phẩm</a>
                        <ul>
                            <li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
                            <li><a href="quanlysanpham.php">Quản lý kho</a></li>
                            <li><a href="quanlysanpham.php">Quản lý ảnh sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="../xu_ly_don_hang/quanlydonhang.php">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right">
        <?php 
            require_once("connect.php");
            $sql = "SELECT * FROM san_pham";
            $result = mysqli_query($ketnoi,$sql);
            $locsanpham="SELECT * FROM loai";
            $result_locsanpham = mysqli_query($ketnoi,$locsanpham);
        ?>
        <form method="post" action="them_anh_xu_ly.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã Sản phẩm</td>
                    <td>
                        <select name="" id="">
                            <?php foreach($result_locsanpham as $locsanpham){?>
                            <option value="<?php echo $locsanpham['Ma_Loai']?>">
                                <?php echo $locsanpham['Ten_Loai']?>
                                <?php  $ma_loai=$locsanpham['Ma_Loai']?>
                            </option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tên Sản phẩm</td>
                    <td>
                        <input type="text" name="term" id="term" placeholder="Nhập tên sản phẩm">
                    </td>
                </tr>
                <tr>
                    <td>anh</td>
                    <td><input type="file" name="Anh"></td>
                </tr>
            </table>
            <button>Thêm</button>
            <script type="text/javascript">
            $(function() {
                $("#term").autocomplete({
                    source: 'search.php',
                });
            });
            </script>
        </form>
        <div class="container">
            <div class="row">
                <h2>Search Here</h2>
                <input type="text" name="term" id="term" placeholder="search here...." class="form-control">
            </div>
        </div>
        <script type="text/javascript">
        $(function() {
            $("#term").autocomplete({
                source: 'search.php',
            });
        });
        </script>
    </div>

</body>

</html>