    <?php
$tenLoaiHang = $_POST['ten_loai_hang'];
$moTa = $_POST['mo_ta'];
$id = $_POST['id'];

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

    $sql = "Update mis_loai_hang
    set ten_loai_hang = '".$tenLoaiHang."', mo_ta = '".$moTa."'
    where id = ".$id;
    // $result = mysqli_query($conn,$sql);
    // $sql = "SELECT * from mis_loai_hang";


    if($conn->query($sql)){
        echo "Sửa thành công";
        
    }else echo "Sửa không thành công";

    
    //$ketquatruyvan = $conn -> query($sql);

?>