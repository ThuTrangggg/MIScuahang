<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách mặt hàng</title>
    <link rel="stylesheet" href="../js_bootstrap/bootstrap.min.css" />
    <script src="../jquery-3.1.1.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">

        <table class="table table-striped table-bordered " style="text-align: center ;" cellspacing ="0" cellpadding="0" border="1" width="300px">
         <tr>
             <th>STT</th>
             <th>Tên loại hàng</th>
             <th>Tên mặt hàng</th>
             <th>Hình ảnh</th>
             <th>Giá bán</th>
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
        
            $sql = "SELECT mh.id, mh.ten_mat_hang, lh.ten_loai_hang,hinh_anh,gia_ban
            FROM mis_mat_hang AS mh
            INNER JOIN mis_loai_hang AS lh 
                ON lh.Id = mh.loai_hang_id
            ORDER BY mh.loai_hang_id";

            // $result = mysqli_query($conn,$sql);
            $ketquatruyvan = $conn -> query($sql);
        
            if($ketquatruyvan->num_rows>0){
                $i =1;
                while($loaiHang = $ketquatruyvan -> fetch_assoc()){
            ?>
                    <tr >
                        <td><?php echo $i;?></td>
                        <td><?php echo $loaiHang['ten_loai_hang']?></td>
                        <td><?php echo $loaiHang['ten_mat_hang']; ?></td>
                        <td><img width="200px" src="../assets/img/<?php echo $loaiHang['hinh_anh']; ?>" alt=""></td>
                        <td><?php echo $loaiHang['gia_ban']; ?></td>
                        <td><a class="btn btn-info" target="_blank" href="sua_mat_hang.php?id=<?php echo $loaiHang['id'];?>">Sửa</a>
                        <a class="btn btn-danger" href="xoa_loai_hang.php?id=<?php echo $loaiHang['id'];?>">Xóa</a></td>
                        <br>
                    </tr>
                    
                <?php
                    $i++;
                }
                    
            }
            
            ?>
            <tr>
                <td colspan="5"><a class="btn btn-info" href="them_mat_hang.php" target="_blank">Thêm mới</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
