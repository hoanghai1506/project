<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tất cả sản phẩm <?php  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link rel="stylesheet" href="./access/css/style.css">
    <link rel="stylesheet" href="./access/css/demo.css">
    <style>
    a {
        text-decoration: none;
        color: black;
    }
    </style>

</head>

<body>

    <?php 
        if(isset($_SESSION['err'])){
           echo '<script>alert("OOP! Sản phẩm đã hết hàng mất rồi!")</script>';
              unset($_SESSION['err']);
        }
    
    ?>
    <main>
    <?php 
    if(isset($_SESSION['Ten_Dang_Nhap'])){
        require_once 'header_sau_khi_dang_nhap.php';
    }else{

        require_once 'header.php'; 
        
    }
        ?>
    
    <?php 
    require_once 'connect.php';
    $loai = $_GET['Ma_Loai'];
        $p=1;
        if(isset($_GET['p'])){
            $p = $_GET['p'];
        }
        $So_San_Pham =10;
        $Tong_San_Pham = mysqli_query($ketnoi,"SELECT Count(Ma_San_Pham) as Tong FROM san_pham where Ma_Loai = $loai");
        foreach ($Tong_San_Pham as $each){
            $Tong = $each['Tong'];
        }
        $So_Trang = ceil($Tong/$So_San_Pham);
        $start =($p-1)*$So_San_Pham;
    ?>
        
        <?php
   
    
    $sql = "SELECT *
        FROM san_pham as sp
        JOIN anh_san_pham as asp
            using(Ma_San_Pham)
        JOIN loai as lo
            using(Ma_Loai)
        WHERE lo.Ma_Loai = $loai 
        limit $start,$So_San_Pham";

    $result = mysqli_query($ketnoi, $sql);
    $sql_ten_loai = "SELECT * FROM loai WHERE Ma_Loai = $loai";
    $result_ten_loai = mysqli_query($ketnoi, $sql_ten_loai);
    ?>
        <?php foreach ($result_ten_loai as $ten_sp){?>
        <h1>Sản phẩm <?php echo$ten_sp['Ten_Loai'] ?></h1>
        <?php } ?>
       
        <div class="container bg-white">
            <div class="row">
                <?php foreach($result as $row){?>
                <div
                    class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div class="product">
                        <a href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>"><img
                                src="../admin/quan_ly_san_pham/anh/<?php echo $row['Anh']?>" alt="anh"></a>
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon">
                                <a
                                    href="Them_gio_hang_xu_ly.php?Ma_San_Pham=<?php echo$row['Ma_San_Pham'] ?>&Ma_Loai=<?php echo$row['Ma_Loai'] ?>&type=trang_toan_bo_sp">
                                
                                <span class="fas fa-shopping-bag"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tag bg-red">
                        <?php 
                            if($row['So_Luong_Trong_Kho'] ==0){
                                echo "Hết hàng";
                            }else{
                                echo "con hàng";
                            }
                        ?>

                    </div>
                    <div class="title pt-4 pb-1"><a
                            href="view_detail.php?Ma_San_Pham=<?php echo $row['Ma_San_Pham']?>"><?php echo$row['Ten_San_Pham'] ?></a>
                    </div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span>
                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                            class="fas fa-star"></span> <span class="fas fa-star"></span>
                    </div>
                    <div class="price"><?php $gia=number_format($row['Gia'], 0, ",", ".");
                                echo $gia; ?></div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
        </div>
        <div class="phan_trang">
            <ul class="pagination">
                <?php for($i=1;$i<=$So_Trang;$i++){?>
                <li class="page-item"><a class="page-link" href="view_all_product.php?Ma_Loai=<?php echo $loai?>&p=<?php echo $i?>"><?php echo $i?></a></li>
                <?php } ?>
            </ul>
        </div>
    </main>

    <?php require_once 'footer.html'; ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> -->
</body>

</html>