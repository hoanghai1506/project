<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang Quan ly</title>
    <style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    
    </style>
    <Script>
        function validate() {
            var dem =0;
            var ten = document.getElementById("Ten_Nhan_Vien").value;
            if (ten.length == 0) {
                document.getElementById("error_ten").innerHTML ="Vui lòng nhập tên nhân viên";
                dem++;
            } else {
                document.getElementById("error_ten").innerHTML ="";
            };
            if(dem == 1) {
                return true;
            } else {
                return false;
            }
    </Script>
</head>

<body>
    <div class="top">
        <h1> Chào mừng đến với trang quản lý</h1>
    </div>
    <div class="left">
        <div class="navigation">
            <div class="nav">
                <ul>
                    <li><a href="index.php">Trang chủ </a></li>
                    <li><a href="quanlynhanvien.php">Quản lý nhân viên </a></li>
                    <li><a href="#">Quản lý khách hàng</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="center">

    </div>
    <div class="right">
        <h2>Thông tin nhân viên </h2>
        <form method="post" action="xulythem.php">
            <table>
                <tr>
                    <td>Tên nhân viên</td>
                    <td><input type="text" name="Ten_Nhan_Vien" id="Ten_Nhan_Vien" ><span id="error_ten"></span></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="Dia_Chi" id="Dia_Chi"></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="So_Dien_Thoai" id="So_Dien_Thoai" ></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="Ngay_Sinh" id="Ngay_Sinh"></td>
                </tr>
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" name="Ten_Dang_Nhap" id="Ten_Dang_Nhap"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="Mat_Khau" id="Mat_Khau"></td>
                </tr>
                <tr>
                    <td>Cấp độ</td>
                    <td><input type="text" name="Cap_Do" id="Cap_Do" ></td>
                </tr>
                <tr>
                    <button class="button" type="submit" onclick="return validate()">Thêm</button>
                </tr>
                <tr>

        </form>

    </div>
</body>

</html>