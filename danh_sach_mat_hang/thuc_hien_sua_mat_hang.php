<?php include "../functions.php";
$tenMatHang = $_POST['ten_mat_hang'];
$moTa = $_POST['mo_ta'];
$giaBan = $_POST['gia_ban'];
$hinhAnh = $_POST['hinh_anh'];
$loaiHangID = $_POST['loai_hang_id'];
$id = $_POST['id'];

echo $_POST['mo_ta'];

echo $_POST['loai_hang_id'];

print_r($_POST['loai_hang_id']);

$sql = "update mis_mat_hang set 
ten_mat_hang = '".$tenMatHang."', 
mo_ta='".$moTa."',hinh_anh='".$hinhAnh."',
gia_ban='".$giaBan."',loai_hang_id= '".$loaiHangID."' WHERE id=".$id;

if($conn->query($sql)){
    echo "Thêm mới thành công";
   echo"<script> window.location = 'danh_sach_mat_hang.php';</script>";

}
?>