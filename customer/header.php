<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a8994a5d4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .nav .sub_menu{
        position: absolute;
        top: 100%;
        left: 0;
        background-color: rgb(255, 255, 255);
        width: 200px;
        display: none;
    }
    .nav .sub_menu li a{
        width:200px
    }
    .icon_login{
        left: 20px;
    }

    </style>
</head>

<body>
    <div class="nav">
        <ul>
            <li><a href="">nữ</a></li>
            <li><a href="">nam</a></li>
            <li><a href="">trẻ em</a></li>
            <li><a href="">polo yody</a></li>
            <li><a href="">bộ sưu tập</a></li>
            <li>
                <div class="warp">
                    <div class="search">
                        <input type="text" name="" class="searchTerm">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i> </button>
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
        </ul>
    </div>
</body>

</html>