
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MIS CỬA HÀNG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./js_bootstrap/bootstrap.min.css">
  <script src="./js_bootstrap/jquery-3.1.1.min.js"></script>
  <script src="./js_bootstrap/bootstrap.min.js"></script>
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
  <?php include "functions.php"
  ?>
<div class="jumbotron">
  <div class="container text-center">
    <h1>CỬA HÀNG MIS</h1>      
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
        <li class="active"><a href="#">Trang chủ </a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li><a href="#">Tin tức</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="#">Liên hệ </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Tài khoản</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php $sql = "SELECT mh.id, mh.ten_mat_hang, lh.ten_loai_hang, mh.hinh_anh, mh.gia_ban
        FROM mis_mat_hang AS mh
        INNER JOIN mis_loai_hang AS lh 
            ON mh.loai_hang_id = lh.id
        ORDER BY mh.loai_hang_id";
    //echo sql
    $ketquatruyvan = $conn->query($sql);
    if($ketquatruyvan->num_rows > 0){
        $i = 0;
        while($matHang = $ketquatruyvan->fetch_assoc()){
            if($i%3 == 0){
    ?>
<div class="container">    
  <div class="row">
    <?php 
        }
    ?>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading"><?php echo $matHang['ten_mat_hang']; ?></div>
        <div class="panel-body"><img src="./assets/img/<?php echo $matHang['hinh_anh']?>" class="img-responsive" style="width:100%" alt="Image"><?php echo $matHang['hinh_anh']?></div>
        <div class="panel-footer"><?php echo $matHang['gia_ban']; ?></div>
      </div>
    </div>
    <?php
        if ($i%3 == 2){
?>
    </div>
</div><br>
<?php
        }
        $i++;
    }
}
?>
<br><br>
<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
