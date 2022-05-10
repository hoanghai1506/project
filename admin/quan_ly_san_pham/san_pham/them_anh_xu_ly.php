<?php
    $Ma_San_Pham = $_POST['Ma_San_Pham'];
    $Anh = $_FILES['Anh'];

    // lưu ảnh vào thư mục uploads
    $folder ='anh/';
    $file_extension = explode('.', $Anh['name'])[1];
    $file_name =  time(). '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($Anh["tmp_name"], $path_file);
    require_once 'connect.php';

    $sql = "INSERT INTO anh_san_pham(Ma_San_Pham, Anh) VALUES ('$Ma_San_Pham', '$file_name')";
    mysqli_query($ketnoi, $sql);
?>