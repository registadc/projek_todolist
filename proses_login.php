<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($query) == 1){
    $user = mysqli_fetch_array($query);
    $_SESSION['id_user'] = $user['id_user'];
    header("location:index.php?login=sukses");
    exit;
}else{
    header("location:login.php?login=gagal");
    exit;
}




?>