<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cửa hàng MIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Cửa hàng MIS</h1>      
    <p>Công nghệ đỉnh cao, nghiệp vụ thành thạo</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">
        <img src="./assets/img/mis.jpg" style="width:45px; line-height:50px; padding:0" alt="">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../index.php">Trang chủ </a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li><a href="#">Tin tức</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user">
            </span> Tài khoản
            <span class="caret"></span>
          </a>
            <ul class="dropdown-menu">
              <li><a href="./sign_log_in/dang_ky.php">Đăng ký</a></li>
              <li><a href="./sign_log_in/dang_nhap.php">Đăng nhập</a></li>
            </ul>
          </li> -->
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user"></span> 
                <?php
                session_start();
                if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
                    echo "Xin chào ".$_SESSION['ten_dang_nhap'];
                }
                else{
                    echo "Tài khoản";
                }
                ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <?php                
                if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
                ?>
                <li><a href="#">Thông tin tài khoản</a></li>
                <li><a href="../sign_log_in/dang_xuat.php">Đăng xuất</a></li> 
                <?php
                }
                else{
                ?>
                <li><a href="../sign_log_in/dang_nhap.php">Đăng nhập</a></li>
                <li><a href="../sign_log_in/dang_ky.php">Đăng ký</a></li> 
                <?php    
                }
                ?>                        
            </ul>

        <li>
        <a href="../thanh_toan/gio_hang.php">
                <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng
                <?php                
                if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
                    echo "(".$_SESSION['gio_hang']['tong_so'].")";
                }
                ?>
            </a>
      </ul>
    </div>
  </div>
</nav>