<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 align = "center">Danh sách các đầu sách</h3>
    <table border="1" align="center" cellspacing ="0" cellpadding="0" width="850px">
        <tr>
            <th>Sách ID</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Nhà xuất bản ID</th>
            <th>Ngày xuất bản</th>
            <th>Loại sách ID</th>
            <th>Giá bán</th>
            <th>Số trang</th>
            <th>Mô tả</th>
        </tr>

    <?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hoangthutrang_cua_hang_sach";

    //Creat connection
    $conn = new mysqli($severname,$username,$password,$dbname);

    //Check connection
    if($conn -> connect_error){
        die("connection failed:".$conn->connect_error);
    }

    $sql = "SELECT * from tblsach";
    $result = mysqli_query($conn,$sql);
    //$ketquatruyvan = $conn -> query($sql);

    if($result->num_rows>0)
        while($row = $result -> fetch_assoc()): ?>
            <tr>
            <td><?php echo htmlspecialchars($row['sach_id'])?></td>
            <td><?php echo $tenSach?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
