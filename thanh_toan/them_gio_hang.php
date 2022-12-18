<?php
    include '../header.php';
    if(isset($_SESSION['login']) == false && $_SESSION['login'] != 1){
        ?>
        <script>
    alert('Bạn chưa đăng nhập');
    location = '../sign_log_in/dang_nhap.php';
</script>
<?php
    }
    $id = $_POST['id'];
    $tenMatHang = $_POST['ten_mat_hang'];
    $soLuong = $_POST['so_luong'];
    $soLuong = (int)($soLuong);
    $giaBan =  $_POST['gia_ban'];
    $giaBan = (float) $giaBan;

    if($soLuong == 0 || $soLuong == ""){
    ?>
        <script type="text/javascript">
        alert("Số lượng phải lớn hơn 0");
        history.back(-2);
        </script>
<?php }
    else{
       if(!isset($_SESSION["gio_hang"]["mat_hang"][$id])){
        $_SESSION["gio_hang"]["mat_hang"][$id] = array(
            'id'=>$id,
            'ten_mat_hang'=> $tenMatHang,
            'gia_ban'=> $giaBan,
            'so_luong'=> $soLuong,
        );
       }
       else{
        $_SESSION["gio_hang"]["mat_hang"][$id]['so_luong'] += $soLuong;
       };
       
    }
    $_SESSION["gio_hang"]["tong_so"]=0;

    foreach($_SESSION["gio_hang"]["mat_hang"] as $gioHang){
        $_SESSION["gio_hang"]["tong_so"]+= $gioHang["so_luong"];
    }
       ?>
       <script type="text/javascript">
       alert("Thêm thành công");
       location = '../index.php';
       </script>
<?php            // $sp=['id'=>$id,'ten_mat_hang'=>$tenMatHang,'gia_ban'=>$giaBan,'so_luong'=>$soLuong];
            // $_SESSION["gio_hang"]["mat_hang"][] = $sp;        // $_SESSION["gio_hang"]["mat_hang"][] =  ['id'=>$id,'ten_mat_hang'=>$tenMatHang,'gia_ban'=>$giaBan,'so_luong'=>$soLuong];
        // echo $_SESSION["gio_hang"]["mat_hang"]['ten_mat_hang'];
        //Kiem tra san pham co trung trong gio hang khong
        // echo $_SESSION["gio_hang"]["mat_hang"][4]['ten_mat_hang'];
        //var_dump($_SESSION["gio_hang"]["mat_hang"]);
        // echo $tenMatHang;
        // var_dump($_SESSION["gio_hang"]["mat_hang"][2]['ten_mat_hang']);
        // $fl = 0;
        // for($i=0;$i<sizeof($_SESSION["gio_hang"]["mat_hang"]);$i++){
        //     if($_SESSION["gio_hang"]["mat_hang"][$i]['ten_mat_hang'] == $tenMatHang){
        //         $fl =1;
        //         $soLuongNew = $_SESSION["gio_hang"]["mat_hang"][$i]['so_luong'] + $soLuong;
        //         // echo $soLuongNew;
        //         var_dump($soLuongNew);
        //         $_SESSION["gio_hang"]["mat_hang"][$i]['so_luong'] =  $soLuongNew;
        //         break;
        //     }
        // }
        // if($fl==0){
        //     $sp=['id'=>$id,'ten_mat_hang'=>$tenMatHang,'gia_ban'=>$giaBan,'so_luong'=>$soLuong];
        //     $_SESSION["gio_hang"]["mat_hang"][] = $sp;
        // }
        // echo $_SESSION["gio_hang"]["mat_hang"]['so_luong'];
        // $_SESSION["gio_hang"]["mat_hang"]["tong_so"] = $soLuong;
    include 'footer.php';
?>