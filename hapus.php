<?php
session_start();
include 'koneksi.php';

$id_todo = $_GET['id_todo'];

$sql = "DELETE FROM todo WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?hapus=sukses");
    exit;
}else{
    header("location:hapus.php?hapus=gagal");
    exit;
}


?>