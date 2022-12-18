<?php
include "../functions.php";
$id = $_GET['id'];
$sql = "delete from mis_mat_hang where id=".$id;

if($conn->query($sql)){
    echo "Xóa thành công";
    echo "<script>
    window.location='danh_sach_mat_hang.php'
    </script>";
}
?>