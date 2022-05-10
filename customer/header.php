<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        .navigation {
            width: 100%;
            height: 52px;
            margin-top: 10px;
        
        }
        
        .nav {
            width: 100%;
            height: 52px;
            padding-left: 10px;
            padding-right: 10px;
        }
        .nav ul{
            margin-left:auto;
            margin-right:auto;
            text-align:center;
        }
        
        .nav ul li {
            display: inline-block;
            list-style: none;
        }
        
        .nav ul li a {
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
        .user{
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <div class="navigation">
        <div class="container">
            <div id="navigation">
                <div class="nav">
                    <ul>
                        <li><a href="">bst xuân hè</a></li>
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
                        <li><img src="./access/icon/user.png" alt="logo" class="user"></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>