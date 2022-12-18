<?php
    include '../header.php';
    include '../functions.php';
    $today = date('Y/m/d');

    if(!isset($_SESSION['login']) && $_SESSION['login'] != 1){
        ?>
        <script>
        alert('Bạn chưa đăng nhập');
        location = '../sign_log_in/dang_nhap.php';
        </script>
<?php }
    elseif(!isset($_SESSION['gio_hang']['tong_so'])){
        ?>
        <script>
        alert('Thêm sản phẩm vào giỏ hàng');
        location = '../sign_log_in/gio_hang.php';
        </script>
<?php
    }else{
        $sql = "insert into mis_hoa_don(ngay_hoa_don,nguoi_dung_id,tong_tien)
        values ('".$today."','".$_SESSION["userId"]."','".$_SESSION["gio_hang"]["tong_tien"]."')";
        if($conn->query($sql)){
            $last_id = $conn->insert_id;
            foreach($_SESSION["gio_hang"]["mat_hang"] as $gioHang){
                $sql1 = "insert into chi_tiet_hoa_don(hoa_don_id,mat_hang_id,gia_ban,so_luong)
                values ('".$last_id."','".$gioHang['id']."','".$gioHang['gia_ban']."','".$gioHang['so_luong']."')";
                
                if($conn->query($sql1)){ ?>
                    <script>
                    alert('Thanh toán thành công');
                    location = '../thanh_toan/gio_hang.php';
                    </script>
                <?php
                }
            }
            $_SESSION["gio_hang"]["mat_hang"]=array();
            $_SESSION["gio_hang"]["tong_so"]=0;
        }
        }

        
    
    
?>