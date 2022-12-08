<?php
$tenLoaiHang = $_POST['ten_loai_hang'];
$moTa = $_POST['mo_ta'];

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

    $sql = "INSERT INTO mis_loai_hang(ten_loai_hang,mo_ta) 
    values ('".$tenLoaiHang."','".$moTa."')";
    // $result = mysqli_query($conn,$sql);
    // $sql = "SELECT * from mis_loai_hang";


    if($conn->query($sql)){
        echo "Thêm mới thành công";
    }else echo "Thêm mới không thành công";

    //$ketquatruyvan = $conn -> query($sql);

?>