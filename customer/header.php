<?php
if (session_id() === '') {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
        background-color: rgb(255, 255, 255);
        width: 200px;
        display: none;
    }

    .nav .sub_menu li a {
        width: 200px
    }

    .icon_login {
        left: 20px;
    }

    .nav li a i {
        margin-left: 30px;
    }

    .section {
        clear: both;
        padding: 0px;
        margin: 0px;
    }

    /*  COLUMN SETUP  */
    .col {
        display: block;
        float: left;
        margin: 1% 0 1% 1.6%;
    }

    .col:first-child {
        margin-left: 0;
    }

    /*  GROUPING  */
    .group:before,
    .group:after {
        content: "";
        display: table;
    }

    .group:after {
        clear: both;
    }

    .group {
        zoom: 1;
        /* For IE 6/7 */
    }

    .span_5_of_5 {
        width: 100%;
    }

    .span_4_of_5 {
        width: 79.68%;
    }

    .span_3_of_5 {
        width: 59.36%;
    }

    .span_2_of_5 {
        width: 39.04%;
    }

    .span_1_of_5 {
        width: 18.72%;
    }

    /*  GO FULL WIDTH BELOW 480 PIXELS */
    @media only screen and (max-width: 480px) {
        .col {
            margin: 1% 0 1% 0%;
        }

        .span_1_of_5,
        .span_2_of_5,
        .span_3_of_5,
        .span_4_of_5,
        .span_5_of_5 {
            width: 100%;
        }
    }

    .col a {
        text-decoration: none;
        color: #000;
    }

    /* .gio_hang{
        position: fixed;
        top: 0;
        right: 0;
        width: 360px;
        min-height:100vh;
        background-color: #fff;
        padding:20px;
        background: rgba(52, 152, 219,1.0);
        box-shadow: -2px 0 5px rgb(189, 195, 199);
    }
    .ten_sp{
        text-align: center;
        font-size:1.5rem;
        font-weight:600;
        margin-top:2rem
    } */
    .container_1 {
        max-width: 1068px;
        margin: auto;
        width: 100%;
    }

    .product-box {
        position: relative;
    }


    .product-box:hover {
        padding: 5px;
        border: 10px solid var(--text-color);
        transition: 0.4s;
    }

    .shop {
        margin-top: 2rem;
    }

    .shop-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, auto));
        grid-gap: 1rem;
    }

    section {
        padding: 4rem 0 3rem;
    }
    .searchButton{
        position: relative;
    }
    .search_box {
        width: 100%;
        height:500px;
        top:-100%;
        position: absolute;
        display: flex;
        /* background-color: aqua; */
        z-index: 1;
        transition: 0.5s;
    }
    .search_box .active{
        top:0;
    }
    .close_search{
        position: absolute;
        top: 0;
        right: 0;
        width: 30px;
        height: 30px;
        margin-bottom: 1.5rem;
        background-color: #fff;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        font-size: 1.5rem;
        cursor: pointer;
        z-index: 1;
    }
    </style>
</head>

<body>
    <div class="nav">
        <ul>
            <li><a href="view_all_product.php?Ma_Loai=1">nữ</a></li>
            <li><a href="view_all_product.php?Ma_Loai=2">nam</a></li>
            <li><a href="view_all_product.php?Ma_Loai=3">trẻ em</a></li>
            <li>
                <div class="warp">
                    <div class="search">
                        <form action="" method="get">

                            <input type="text" name="search" class="searchTerm" value="search">
                            <button type="submit" class="searchButton" name="ok">
                                <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                </div>
            </li>
            <li class="icon_login">
                <a href="login.php">
                    <i class="fa-solid fa-user" style="size:45px;"></i>
                </a>
                <ul class="sub_menu">
                    <li><a href="login.php">đăng nhập</a></li>
                    <li><a href="signin.html">đăng ký</a></li>
                </ul>
            </li>
            <li><a href="hoa_don.php"><i class="fa fa-shopping-cart" style="font-size:25px;color:orange"></i></a>
                <div class="gio_hang">

                </div>

            </li>
        </ul>
    </div>
    <div class="search_box">
        <i class="bx bx-x" class="close_search"></i>
    <?php
    require_once 'connect.php';

    if (isset($_REQUEST['ok'])) {
        $search = addslashes($_GET['search']);

        if (empty($search)) {
            echo "vui lòng nhập từ khóa";
        } else {
            $query = "select * 
                        from san_pham as sp
                        join anh_san_pham as asp
                            using(Ma_San_Pham)
                        where Ten_San_Pham like '%$search%'";
            $result = mysqli_query($ketnoi, $query);
            $num = mysqli_num_rows($result);
            $p=1;
                if(isset($_GET['p'])){
                    $p=$_GET['p'];
                }
                $So_San_Pham=4;
                $Tong_San_Pham=$num;
                $So_Trang=ceil($Tong_San_Pham/$So_San_Pham);
                $start=($p-1)*$So_San_Pham;
            if ($num > 0 && $search != "") {
                echo "$num kết quả trả về với từ khóa <b>$search</b>";
    ?>
    
    <section class="shop container_1">
        <div class="shop-content">
            <?php 
                
                $sql="select * 
                        from san_pham as sp
                        join anh_san_pham as asp
                            using(Ma_San_Pham)
                        where Ten_San_Pham like '%$search%'
                        limit $start,$So_San_Pham";
                $result_2=mysqli_query($ketnoi,$sql);

            ?>

            <?php foreach ($result_2 as $row) {
                            ?>
            <div class="product-box">
                <a href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham'] ?>">
                    <img src="../admin/quan_ly_san_pham/anh/<?php echo $row['Anh'] ?>" alt="Anh san pham" width="100px"
                        class="product-img">
                </a>
                <br>
                <h2 class="product-title"><a href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham'] ?>">
                        <?php echo $row['Ten_San_Pham'] ?></a>

                </h2>
                <p>
                    <?php echo number_format($row['Gia']) ?>
                </p>
            </div>


            <?php
                    }
                    ?>

        </div>
        <div class="phan_traang">
        <ul class="pagination">
            <?php
                    for($i=1;$i<=$So_Trang;$i++){
                        ?>
            <li class="page-item"><a class="page-link"
                    href="header.php?search=<?php echo $search?>&p=<?php echo $i?>&ok=<?php $search?>"><?php echo $i?></a></li>
            <?php
                    }
                    ?>
        </ul>
    </div>

    </section>
    <?php
            } else {
                echo "không tìm thấy kết quả nào";
            }
        }
    }

    ?>
    </div>
    
</body>

</html>