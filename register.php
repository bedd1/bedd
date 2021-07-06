<?php 
include "koneksi.php";

$nickname = $_POST['nickname'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "insert into tb_user (nickname,username,password,role) values ('$nickname','$username','$password','User')";
$query = mysqli_query($con,$sql);

if ($query) {
    header("location: login.php");
} else {
    # code...
}

?>