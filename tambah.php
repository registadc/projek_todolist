<?php
include 'koneksi.php';

$kategori = mysqli_query($koneksi, "SELECT * FROM category");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
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


        label{
            display: block;
            font-size: 15px;
            margin-bottom:5px;
            color: black;
        }

        input[type="text"],
        textarea,
        select{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .btn-add{
            padding: 7px 14px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #59c7f0ff;
            border: none;
            text-decoration: none;
            color:white;
            width: 100%;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah</h2>
        <form action="proses_tambah.php" method="post">
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="title" id="">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="description" id=""></textarea>
            </div>

            <label for="">Kategori</label>
            <select name="id_category" id="">
                <?php while($k = mysqli_fetch_assoc($kategori)){ ?>
                    <option value="<?= $k['id_category']; ?>"><?= $k['category']; ?></option>
                <?php } ?>
            </select>

            <label for="">Status</label>
            <select name="status" id="status">
                <option value="pending">Pending</option>
                <option value="done">Done</option>
            </select>

            <input type="submit" value="Tambah" class="btn-add">
        </form>
    </div>
</div>
    
</body>
</html>