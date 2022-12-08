<?php
$id = $_GET['id'];
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

$sql = "SELECT * from mis_loai_hang where Id =".$id;
// $result = mysqli_query($conn,$sql);
$ketquatruyvan = $conn -> query($sql);

if($ketquatruyvan->num_rows>0){
    while($loaiHang = $ketquatruyvan->fetch_assoc()){
        $tenLoaiHang = $loaiHang['ten_loai_hang'];
        $mota = $loaiHang['mo_ta'];
    }
}else echo "Không có loại hàng nào";

?>
<h1>Sửa loại hàng</h1>
    <form action="thuc_hien_sua_loai_hang.php" method="POST">
        <label for="">Tên loại hàng</label>
        <input type="text" name="ten_loai_hang" value="<?php echo $tenLoaiHang?>"> 
        <br>
        <label for="">Mô tả</label>
        <input type="text" name="mo_ta" id="" value="<?php echo $mota?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $id?>" >
        <input type="submit" value="Lưu">
    </form>
