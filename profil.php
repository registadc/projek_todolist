<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:login.php?logindulu");
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user WHERE id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);

while($user = mysqli_fetch_assoc($query)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            font-family: arial, sans-serif;

        }

        .container{
            margin-top: 90px;
            display: flex;
            justify-content: center;
        }

        .card{
            width: 360px;
            background-color: white;
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .card h2{
            text-align: center;
            margin-bottom: 20px;
        }

         .btn-add{
            padding: 6px 12px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #ba3d3dff;
            border: none;
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>
<div class="container">
    <div class="card">
        <h2>Profil User</h2>

        <p><b>Username : </b> <?= $user['username']; ?></p>
        <p><b>Password : </b> ********* </p>
        <p><b>Nama Lengkap : </b> <?= $user['name']; ?></p>
        <p><b>Email : </b> <?= $user['email']; ?></p>
        <p><b>Tanggal Lahir : </b> <?= $user['birth_date']; ?></p>

        <center><a href="logout.php" class="btn-add">Logout</a></center>
    </div>
    
</div>
    
</body>
</html>


<?php } ?>