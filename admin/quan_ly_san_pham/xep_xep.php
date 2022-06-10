    <?php 
        require_once 'connect.php';
    ?>
<div>
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
        order by Ma_San_Pham desc";
        $sanphm= mysqli_query($ketnoi,$sql);
        ?>
                <?php foreach($sanphm as $each){ ?>
                <tr>
                    <td><?php echo $each['Ma_San_Pham'] ?></td>
                    <td><?php echo $each['Ma_Loai'] ?></td>
                    <td><?php echo $each['Ten_San_Pham'] ?></td>
                    <td><?php echo $each['So_Luong_Trong_Kho'] ?></td>
                    <td><?php echo $each['Gia'] ?></td>
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