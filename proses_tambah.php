<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:login.php?logindulu");
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];
$id_user = $_SESSION['id_user'];

$sql = "INSERT INTO todo(title, description, id_category, status, id_user) VALUES
        ('$title','$description','$id_category','$status','$id_user')";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?tambah=sukses");
    exit;
}else{
    header("location:tambah.php?tambah=gagal");
    exit;
}





?>