<?php
$id = $_GET['id'];

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "mis_cuahang";

$conn = new mysqli($severname,$username,$password,$dbname);

if($conn-> connect_error){
    die("connection failed:".$conn->connect_error);
}

$sqlloaihang = "Select ten_loai_hang from mis_loai_hang";
$result = $conn->query($sqlloaihang);
// while($loaiHang = $result->fetch_assoc()){
//     $loai_hang_id = $loaiHang['Id'];
// }
//Truy vấn mặt hàng có ID trùng với ID vừa chọn
$sql = "SELECT * FROM mis_mat_hang where id=".$id;

// $sql = "SELECT mh.id, mh.ten_mat_hang, lh.ten_loai_hang,hinh_anh,gia_ban, mh.mo_ta,loai_hang_id
// FROM mis_mat_hang AS mh
// INNER JOIN mis_loai_hang AS lh 
//     ON lh.Id = mh.loai_hang_id where mh.id =".$id;

// $result = mysqli_query($conn,$sql);
$ketquatruyvan = $conn -> query($sql);
if($ketquatruyvan->num_rows>0){
    while($matHang = $ketquatruyvan->fetch_assoc()){
        $tenMatHang = $matHang['ten_mat_hang'];
        $mota = $matHang['mo_ta'];
        $giaBan = $matHang['gia_ban'];
        $hinhAnh = $matHang['hinh_anh'];
        // $tenLoaiHang = $matHang['ten_loai_hang'];
        $loaiHangID = $matHang['loai_hang_id'];
    }
}else echo "Không có loại hàng nào";
//Gán giá trị cho các biến PHP sẽ sử dụng để hiển thị trên form 
?>
<h1>Sửa mặt hàng</h1>
    <form action="thuc_hien_sua_loai_hang.php" method="POST">
        <label for="">Tên mặt hàng</label>
        <input type="text" name="ten_mat_hang" value="<?=$tenMatHang?>"> 
        <br>
        <label for="">Mô tả</label>
        <input type="text" name="mo_ta" id="" value="<?=$mota?>">
        <br>
        <label for="">Giá bán</label>
        <input type="number" name="gia_ban" value="<?=$giaBan?>" id="">
        <label for="">Hình ảnh</label>
        <input type="file" value="">
        <label for="">Loại hàng</label>
        <?php $sqlloaihang = "select ten_loai_hang FROM mis_loai_hang";
        $ketquatruyvan = $conn -> query($sql)?>
        <select value = "selected" name="ten_loai_hang" id="">
        <?php
        $sql = "select * from mis_loai_hang";
        $ketquatruyvan = $conn -> query($sql);
            if($result->num_rows>0){
            $i=1;
            while($tenLoaiHang = $result->fetch_assoc()){
                if($loaiHangID == $loai_hang_id){
        ?>
            <option selected value=""> <?php echo $tenLoaiHang['ten_loai_hang'];?></option>
        <?php    $i++;
                }else?>
                    <option selected value=""> <?php echo $tenLoaiHang['ten_loai_hang'];?></option>
                <?php
                
            }

            
        }
            
        ?>

        <input type="hidden" name="id" value="<?php echo $id?>" >
        <input type="submit" value="Lưu">
    </form>
