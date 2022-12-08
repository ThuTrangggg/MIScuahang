<?php
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
?>