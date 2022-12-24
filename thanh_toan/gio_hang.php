<?php
    include '../header.php';
    if(!isset($_SESSION['login']) && $_SESSION['login'] != 1){
        ?>
        <script>
    alert('Bạn chưa đăng nhập');
    location = '../sign_log_in/dang_nhap.php';
</script>
<?php
    }
    $i = 0;
    $tongTien =0;
?>
<html>
    <table class="table table-striped table-bordered " style="max-width: 1000px; margin: auto">
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>

        </tr>
        <?php
            $_SESSION["gio_hang"]["tong_so"]=0;
        foreach($_SESSION["gio_hang"]["mat_hang"] as $gioHang){
            $thanhTien = $gioHang["gia_ban"] *$gioHang["so_luong"];
            $tongTien += $thanhTien;
            $_SESSION['gio_hang']['tong_tien'] = $tongTien;
            $_SESSION["gio_hang"]["tong_so"]+= $gioHang["so_luong"];
            $i +=1;
            echo '
            <tr>
                <td>'.$i.'</td>
                <td>'.$gioHang['ten_mat_hang'].'</td>
                <td>'.$gioHang['gia_ban'].'</td>
                <td>'.$gioHang['so_luong'].'</td>
                <td>'.$thanhTien.'</td>
            </tr>';
        }
            echo '
            <tr><td colspan="5">
            Tổng giá trị đơn hàng: <b><i>'.$tongTien.'</i></b>
            </td></tr>';
           
            ?>
        
    </table>
    <br><br>
    <div style="text-align:center; margin-bottom: 50px">
        <a class="btn btn-info" href="thanh_toan.php" >Thanh toán</a>
    </div>
</html>
<?php
include '../footer.php';
?>