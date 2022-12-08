<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
    <link rel="stylesheet" href="./js_bootstrap/bootstrap.min.css" />
    <script src="./js_bootstrap/jquery-3.1.1.min.js"></script>
    <script src="./bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">

        <table class="table table-striped table-bordered " style="text-align: center ;" cellspacing ="0" cellpadding="0" border="1" width="300px">
         <tr>
             <th>STT</th>
             <th>Tên loại hàng</th>
             <th>Thao tác</th>
         </tr>
        
                <?php
            $severname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mis_cuahang";
        
            //Creat connection
            $conn = new mysqli($severname,$username,$password,$dbname);
        
            //Check connection
            if($conn -> connect_error){
                die("connection failed:".$conn->connect_error);
            }
        
            $sql = "SELECT * from mis_loai_hang";
            // $result = mysqli_query($conn,$sql);
            $ketquatruyvan = $conn -> query($sql);
        
            if($ketquatruyvan->num_rows>0){
                $i =1;
                while($loaiHang = $ketquatruyvan -> fetch_assoc()){
            ?>
                    <tr >
                        <td><?php echo $i.".";?></td>
                        <td><?php echo $loaiHang['ten_loai_hang']; ?></td>
                        <td><a class="btn btn-info" href="sua_loai_hang.php?id=<?php echo $loaiHang['Id'];?>">Sửa</a>
                        <a class="btn btn-danger" href="xoa_loai_hang.php?id=<?php echo $loaiHang['Id'];?>">Xóa</a></td>
                        <br>
                    </tr>
                    
                <?php
                    $i++;
                }
                    
            }
            
            ?>
            <tr>
                <td colspan="4"><a class="btn btn-info" href="them_loai_hang.php" target="_blank">Thêm mới</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
