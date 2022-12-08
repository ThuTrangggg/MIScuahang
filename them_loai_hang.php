<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    $sql = "SELECT * from mis_loai_hang";
    // $result = mysqli_query($conn,$sql);
    $ketquatruyvan = $conn -> query($sql);

    
    ?>
    <h1>Thêm mới loại hàng</h1>
    <form action="thuc_hien_them_loai_hang.php" method="POST">
        <label for="">Tên loại hàng</label>
        <input type="text" name="ten_loai_hang">
        <br>
        <label for="">Mô tả</label>
        <input type="text" name="mo_ta" id="">
        <br>
        <input type="submit" value="Lưu">
    </form>
</body>
</html>
