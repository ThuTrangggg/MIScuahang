<?php
$tenMatHang = $_POST['ten_mat_hang'];
$moTa = $_POST['mo_ta'];
$giaBan = $_POST['gia_ban'];
$hinhAnh = $_POST['hinh_anh'];
$loaiHang = $_POST['loai_hang_id'];

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

    $sql = "INSERT INTO mis_mat_hang(ten_mat_hang,mo_ta,hinh_anh,gia_ban,loai_hang_id) 
    values ('".$tenMatHang."','".$moTa."','".$hinhAnh."','".$giaBan."','".$loaiHang."')";
    // $result = mysqli_query($conn,$sql);
    // $sql = "SELECT * from mis_loai_hang";


    if($conn->query($sql)){
        echo "Thêm mới thành công";
        echo "
        <script> window.location = 'danh_sach_mat_hang.php';</script>

        ";
    }else echo "Thêm mới không thành công";
    echo "
    <script> window.location = 'danh_sach_mat_hang.php';</script>

    "
    //$ketquatruyvan = $conn -> query($sql);

?>