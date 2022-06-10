<?php
    if(session_id() === '' ){
        session_start();
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a8994a5d4a.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .nav {
        width: 100%;
        height: 52px;
        /* padding-left: 10px;
            padding-right: 10px; */
    }

    .nav ul {
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        height: 52px;
    }

    .nav ul li {
        display: inline-block;
        list-style: none;
    }

    .nav li a {
        display: inline-block;
        text-decoration: none;
        text-transform: uppercase;
        color: rgb(0, 0, 0);
        font-size: 15px;
        padding: 10px;
        border-radius: 5px;
        transition: 0.3s;
    }



    .nav ul li a:hover {
        background-color: rgb(201, 255, 74);
        color: rgb(255, 222, 75);
        cursor: pointer;
    }

    .search {
        width: 100%;
        position: relative;
        display: flex;
    }

    .searchTern {
        width: 100%;
        border: 3px solid #fff;
        border-right: none;
        padding: 5px;
        height: 20px;
        border-radius: 5px 0px 0px 5px;
        outline: none;
        color: #000;
    }

    .searchTern:focus {
        color: #fff;
    }

    .searchButton {
        width: 40px;
        height: 36px;
        border: 1px solid #00B4CC;
        background: #00B4CC;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }

    .wrap {
        width: 30%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .nav li {
        position: relative;
    }


    .nav li:hover .sub_menu {
        display: block;
    }

    .nav .sub_menu {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: rgba(52, 152, 219, 1.0);
        width: 200px;
        height: auto;
        display: none;
    }

    .nav .sub_menu li a {
        width: 200px
    }

    .icon_login {
        left: 20px;
    }

    .nav li img {
        width: 30px;
        height: 30px;
        border-radius: 50%;

    }

    .nav li a i {
        padding-left: 30px;
    }
    </style>
</head>

<body>

    <?php
    require_once 'connect.php';
    $Ten_Dang_Nhap = "";
    if(isset($_SESSION['Ten_Dang_Nhap'])){
        $Ten_Dang_Nhap = $_SESSION['Ten_Dang_Nhap'];
    }
    
    $sql = "SELECT * FROM khach_hang WHERE Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
    ?>
    <?php
        $search="";
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
     ?>
    <div class="nav">
        <ul>
            <li><a href="view_all_product.php?Ma_Loai=1">nữ</a></li>
            <li><a href="view_all_product.php?Ma_Loai=2">nam</a></li>
            <li><a href="view_all_product.php?Ma_Loai=3">trẻ em</a></li>
            <li>
                <div class="warp">
                    <div class="search">
                        <form action="">
                            <input type="text" class="searchTerm" name="search" value="search">
                            <button type="submit" class="searchButton" name="ok">
                                <i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </li>
            <li class="icon_login">
                <?php if(!isset($_SESSION['Ten_Dang_Nhap'])) { ?>
                <a href="login.php">
                    <i class="fa-solid fa-user" style="size:45px;"></i>
                </a>
                <ul class="sub_menu">
                    <li><a href="login.php">đăng nhập</a></li>
                    <li><a href="signin.html">đăng ký</a></li>
                </ul>
                <?php } else { ?>
                <a href="login.php">
                    <?php
                    require_once 'connect.php';
                    $Ten_Dang_Nhap = $_SESSION['Ten_Dang_Nhap'];
                    $sql_lay_anh = "SELECT  
                                    kh.Anh
                                    FROM khach_hang as kh
                                   
                                    where kh.Ten_Dang_Nhap = '$Ten_Dang_Nhap'";
                    $result_lay_anh = mysqli_query($ketnoi, $sql_lay_anh);
                    ?>
                    <?php foreach ($result_lay_anh as $each) { ?>
                    <img src="./anh/<?php echo $each['Anh'] ?>" alt="ang"> <?php } ?>
                </a>
                <ul class="sub_menu">
                    <li><a href="trang_ca_nhan.php">Thông tin cá nhân</a></li>
                    <li><a href="hoa_don.php">Giỏ hàng</a></li>
                    <li><a href="lich_su_don_hang.php">Lịch sử mua hàng</a></li>
                    <li><a href="logout.php">đăng xuất</a></li>
                </ul>
                <?php } ?>
            </li>
            <li><a href="hoa_don.php"><i class="fa fa-shopping-cart" style="font-size:25px;color:orange"></i></a></li>
        </ul>
    </div>
    <?php 
        require_once 'connect.php';
        if(isset($_REQUEST['ok'])){
            $search=addslashes($_GET['search']);

            if(empty($search)){
                echo "vui lòng nhập từ khóa";
            } else {
                $query="select * 
                        from san_pham as sp
                        join anh_san_pham as asp
                            using(Ma_San_Pham)
                        where Ten_San_Pham like '%$search%'";
                $result=mysqli_query($ketnoi,$query);
                $num=mysqli_num_rows($result);
                if($num>0 && $search != ""){
                    echo"$num kết quả trả về với từ khóa <b>$search</b>";
                    ?>

                    
                    
                    <div class="section group">
                   <?php while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col span_1_of_5">
            <a href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>">
                <img src="../admin/quan_ly_san_pham/anh/<?php echo $row['Anh'] ?>" alt="Anh san pham" width="100px">
            </a>
            <br>
            <a href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>">
                <?php echo $row['Ten_San_Pham'] ?>
            </a>
            <p>
                <?php echo number_format($row['Gia']) ?>
            </p>
        </div>


        <?php
                    }
                }
                else{
                    echo "không tìm thấy kết quả nào";
                }
            }
        }

    ?>
</body>

</html>