<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
    <link rel="stylesheet" href="../js_bootstrap/bootstrap.min.css" />
    <script src="../jquery-3.1.1.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
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
    ?>
<h1>Thêm mới mặt hàng</h1>
    <form style="width:300px ; margin-left:300px" action="thuc_hien_them_mat_hang.php" method="POST">
        <label class="form-label" for="">Tên mặt hàng</label>
        <input class="form-control" type="text" name="ten_mat_hang">
        <br>
        <label class="form-label" for="">Mô tả</label>
        <textarea class="form-control" name="mo_ta" id="" cols="30" rows="10"></textarea>
        <br>
        <label class="form-label" for="">Hình ảnh</label>
        <input  type="file" name="hinh_anh" id="">
        <br>
        <label class="form-label" for="">Giá bán</label>
        <input class="form-control" type="text" name="gia_ban" id="">
        <br>
        <?php
        $sql = "select Id,ten_loai_hang FROM mis_loai_hang";
        $ketquatruyvan = $conn -> query($sql)?>
        <select name="loai_hang_id" id="">
            <option value="0" label="Chọn loại hàng"></option>
        <?php if($ketquatruyvan->num_rows>0){
            $i=1;
            while($tenLoaiHang = $ketquatruyvan->fetch_assoc()){
        ?>
            <option value="<?php echo $tenLoaiHang['Id']?>"> <?php echo $tenLoaiHang['ten_loai_hang'];?></option>
        <?php    $i++;               
            }
        }?>

        </select>
        <input type="submit" value="Lưu">
    </form>
</body>
</html>