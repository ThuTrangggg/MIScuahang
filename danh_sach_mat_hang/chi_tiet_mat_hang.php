<?php
    include '../header.php';
    include '../functions.php';
    $id = $_GET['id'];
    $sql = "select * from mis_mat_hang where id=".$id;
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($matHang=$result->fetch_assoc()){
            // echo $matHang['id'];
            ?>
            <div class="container" style="width: 700px">
                
                <div class="row">
                    <div class="col-sm-4">
                        <img width="200px" src="../assets/img/<?=$matHang['hinh_anh']?>" alt="">
                    </div>
                    <div class="col-sm-8">
                        <h2><?=$matHang['ten_mat_hang']?></h2>
                        <p><i>Mô tả: </i> <?=$matHang['mo_ta']?></p>
                        <h4 style="color:red" > <b><?=$matHang['gia_ban']?> đ</b> </h4>
                        <form action="../thanh_toan/them_gio_hang.php" method="POST">
                            <input type="number" name="so_luong" placeholder="Số lượng">
                            
                            <input type="hidden" name="id" id="" value="<?=$matHang['id']?>">
                            <input type="hidden" name="ten_mat_hang" id="" value="<?=$matHang['ten_mat_hang']?>">
                            <input type="hidden" type="number" name="gia_ban" value="<?=$matHang['gia_ban']?>">

                            <input class=" btn-info" type="submit" value="Thêm giỏ hàng">
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>
<br><br>
<?php include'../footer.php'?>