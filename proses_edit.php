<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:login.php?logindulu");
    exit;
}

$id_todo = $_POST['id_todo'];

$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];

$sql = "UPDATE todo SET title = '$title', description = '$description',
        id_category = '$id_category', status = '$status' WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?edit=sukses");
    exit;
}else{
    header("location:edit.php?edit=gagal");
    exit;
}




?>