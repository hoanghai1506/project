<?php 
 $ketnoi = mysqli_connect("localhost","root","","project_web");
 mysqli_set_charset($ketnoi,'utf8');
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
    a {
        text-decoration: none;
        color: black;
    }

    .loc {
        margin-top: 10px;
        margin-bottom: 20px;
        width: 50%;
        float: left;
    }

    .btn_them {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 30%;
        float: right;

    }


    .btn_them .btn_A {
        width: 50px;
        height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        border-radius: 5px;
        text-align: center;
    }

    .btn_A a {
        line-height: 30px;
        color: white;
    }

    .sap_xep {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 20%;
        height: 30px;
        float: left;

    }

    .tang_dan {
        width: 50%;
        height: 30px;
        float: left;
    }

    .giam_dan {
        width: 50%;
        height: 30px;
        float: left;
    }
    .button_c{
        width: 50px;
        height: 30px;
        line-height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        border-radius: 5px;
        text-align: center;
    }
    .button_m{
        width: 70px;
        height: 30px;
        line-height: 30px;
        background-color: rgba(52, 152, 219, 1.0);
        border-radius: 5px;
        text-align: center;
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

    .Chi_tiet_sp {
        background-color: #ecf0f1;
    }

    button {
        width: 100px;
        height: 30px;
        background-color: #3498db;
        margin-top: 10px;
    }

    button:hover {
        background-color: #27ae60;
    }

    select {
        width: 100px;
        height: 30px;
        background-color: #3498db;
        margin-top: 10px;
    }

    .phan_trang {
        align-items: center;
        margin-top: 20px;
        margin-bottom: 20px;
        width: 100%;
        /* float: left; */
    }
    </style>
</head>

<body>
    <?php 
    $p=1;
    if(isset($_GET['p'])){
        $p = $_GET['p'];
    }
    $So_San_Pham =20;
    $Tong_San_Pham = mysqli_query($ketnoi,"SELECT Count(Ma_San_Pham) as Tong FROM san_pham ");
    foreach ($Tong_San_Pham as $each){
        $Tong = $each['Tong'];
    }
    $So_Trang = ceil($Tong/$So_San_Pham);
    $start =($p-1)*$So_San_Pham;
?>
    <?php 
        session_start();
        if(isset($_SESSION['err'])){
            echo "<script>alert('Thêm sản phẩm thành công!'):</script>";
            unset($_SESSION['err']);
        }
    ?>
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
        <div class="loc">
            <?php 
        $sql_locsanpham = "SELECT * FROM loai";
        $loaisanpham= mysqli_query($ketnoi,$sql_locsanpham);
        ?>
            <form action="locsanpham.php" method="post">
                <select name="Ma_Loai" id="">
                    <?php foreach($loaisanpham as $locsanpham){?>
                    <option value="<?php echo $locsanpham['Ma_Loai']?>">
                        <?php echo $locsanpham['Ten_Loai']?>
                        <?php  $ma_loai=$locsanpham['Ma_Loai']?>

                    </option>

                    <?php }?>
                </select>
                <button>Lọc</button>
        </div>
        <div class="sap_xep">
            <div class="tang_dan">
                <div class="button_c">
                    <a href="quanlysanpham.php?ma=1">Cũ nhất</a>
                </div>
            </div>
            <div class="giam_dan">
                <div class="button_m">
                    <a href="quanlysanpham.php?ma=0">Mới nhất</a>
                </div>
            </div>
        </div>
        <div class="btn_them">
            <div class="btn_A">
                <a href="them_sp.php">Thêm</a>
            </div>
        </div>
        </form>
        <div>
            <table>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td>Loại</td>
                    <td>Tên sản phẩm</td>
                    <td>Số lượng trong kho</td>
                    <td>Giá</td>
                    <td>Mô tả</td>
                    <td>Ảnh</td>
                </tr>
                <?php
                $ma='';
                $sap_xep=$_GET['ma'];
                switch ($sap_xep) {
                    case '1':
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
        order by sp.Ma_San_Pham DESC
        limit $start,$So_San_Pham";
                        break;
                    
                    default:
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
                    limit $start,$So_San_Pham";
                        break;
                }
        
        $sanphm= mysqli_query($ketnoi,$sql);
        ?>
                <?php foreach($sanphm as $each){ ?>
                <tr class="Chi_tiet_sp">
                    <td><?php echo $each['Ma_San_Pham'] ?></td>
                    <td><?php
                    switch ($each['Ma_Loai']) {
                        case '1':
                            echo 'Nữ';
                            break;
                        case '2':
                            echo 'Nam';
                            break;
                        case '3':
                            echo 'Trẻ em';
                            break;    
                        default:
                            # code...
                            break;
                    } 
                    ?></td>
                    <td><?php echo $each['Ten_San_Pham'] ?></td>
                    <td><?php echo $each['So_Luong_Trong_Kho'] ?></td>
                    <td><?php 
                    $gia= number_format($each['Gia'], 0, ",", ".");
                    echo $gia; 
                    ?></td>
                    <td><?php echo $each['Mo_ta']?></td>
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

                <?php }?>

            </table>
            <div class="phan_trang">
                <ul class="pagination">
                    <?php for($i=1;$i<=$So_Trang;$i++){?>
                    <li class="page-item"><a class="page-link"
                            href="quanlysanpham.php?p=<?php echo $i?>&ma=<?php echo$sap_xep ?>"><?php echo $i?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>