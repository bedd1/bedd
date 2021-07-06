<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "Select * from tb_user where username='$username' and password=md5('$password')";
$query = mysqli_query($con,$sql) or die(mysqli_error($con));

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);

    $_SESSION['id'] = $data["id"];
    $_SESSION['nickname'] = $data["nickname"];        
    
    if ($data["role"] == "Admin") {        
        header("location: ../page/master.php?page=dashboard");
    } else if ($data["role"] == "Pelayan") {
        echo "<script>alert('Pelayan')</script>";
    } else if ($data["role"] == "User") { 
        header("location: ../index.php");
    } else {
        echo "<script>alert('Ndak Onok')</script>";
    }   

} else {
    echo "<script>alert('tidak ada')</script>";
}

?>